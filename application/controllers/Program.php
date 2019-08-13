<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
                redirect('auth/login', 'refresh');
                return;
            }
    }

    public function index()
    {
        $this->layout->set_title('Tes Kemiripan');
        $this->layout->js('js/plagiat.js');
        $this->layout->load('template', 'program/index');
    }

    public function proses()
    {
        $this->form_validation->set_rules('judul1', 'Judul 1', 'required|trim');
        $this->form_validation->set_rules('judul2', 'Judul 2', 'required|trim');
        $this->form_validation->set_rules('n_gram', 'N Gram', 'required|trim|numeric');
        $this->form_validation->set_rules('window', 'Window', 'required|trim|numeric');
        $this->form_validation->set_rules('bilangan_prima', 'Bilangan Prima', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $response = [
                'status' => FALSE,
                'error' => $this->form_validation->error_array()
            ];
            echo json_encode($response);
            return;
        }

        $judul1 = $this->input->post('judul1');
        $judul2 = $this->input->post('judul2');
        $n_gram = (int)$this->input->post('n_gram');
        $window = (int)$this->input->post('window');
        $bilangan_prima = (int)$this->input->post('bilangan_prima');
        /* $judul1 = 'Indonesia Raya';
        $judul2 = 'Indonesia Jaya';
        $n_gram = 5;
        $window = 4;
        $bilangan_prima = 2; */

        $this->load->library('Winnowing');
        $this->winnowing->setJudul($judul1, $judul2);
        $this->winnowing->SetPrimeNumber($bilangan_prima);
        $this->winnowing->SetNGramValue($n_gram);
        $this->winnowing->SetNWindowValue($window);

        $this->winnowing->process();

        $n_gram_judul1 =''; 
        foreach($this->winnowing->GetNGramFirst() as $ng){
            $n_gram_judul1 .= $ng.' ';
        }
        $n_gram_judul2 =''; 
        foreach($this->winnowing->GetNGramSecond() as $ng){
            $n_gram_judul2 .= $ng.' ';
        }

        $rolling_hash_judul1='';
        foreach($this->winnowing->GetRollingHashFirst() as $rl){
            $rolling_hash_judul1 .= $rl.' ';
        }
        $rolling_hash_judul2='';
        foreach($this->winnowing->GetRollingHashSecond() as $rl){
            $rolling_hash_judul2 .= $rl.' ';
        }

        $wd = $this->winnowing->GetWindowFirst();
        $window_judul1 = '';
        for($i = 0; $i< count($wd); $i++){
            $s = '';
            for($j=0; $j < $window; $j++){
                $s .= $wd[$i][$j]. ' ';
            }
            $window_judul1 .= "W-".($i+1)." : {".rtrim($s, ' ')."} \n";
        }
        $wd = $this->winnowing->GetWindowSecond();
        $window_judul2 = '';
        for($i = 0; $i< count($wd); $i++){
            $s = '';
            for($j=0; $j < $window; $j++){
                $s .= $wd[$i][$j]. ' ';
            }
            $window_judul2 .= "W-".($i+1)." : {".rtrim($s, ' ')."} \n";
        }

        $fp_judul1 = '';
        foreach($this->winnowing->GetFingerprintsFirst() as $fp){
            $fp_judul1 .= $fp.' ';
        }
        $fp_judul2 = '';
        foreach($this->winnowing->GetFingerprintsSecond() as $fp){
            $fp_judul2 .= $fp.' ';
        }

        $count_fingers1 = count($this->winnowing->GetFingerprintsFirst());
        $count_fingers2 = count($this->winnowing->GetFingerprintsSecond());

        $count_union_fingers = count(array_merge($this->winnowing->GetFingerprintsFirst(), $this->winnowing->GetFingerprintsSecond()));
        $count_intersect_fingers = count(array_intersect($this->winnowing->GetFingerprintsFirst(), $this->winnowing->GetFingerprintsSecond()));

        $response = [
            'status' => true,
            'data' => [
                'judul1' => [
                    'n_gram' => rtrim($n_gram_judul1, ' '),                    
                    'rolling_hash' => rtrim($rolling_hash_judul1, ' '),
                    'window' => $window_judul1,
                    'finger_print' => rtrim($fp_judul1, ' '),
                    'count_finger' => $count_fingers1,
                ],
                'judul2' => [
                    'n_gram' => rtrim($n_gram_judul2, ' '),
                    'rolling_hash' => rtrim($rolling_hash_judul2, ' '),
                    'window' => $window_judul2,
                    'finger_print' => rtrim($fp_judul1, ' '),
                    'count_finger' => $count_fingers2
                ],
                'count_union' => $count_union_fingers,
                'count_intersect' => $count_intersect_fingers,
                'jaccard' => $this->winnowing->GetJaccardCoefficient()
            ]
        ];

        echo json_encode($response);
    }
}
