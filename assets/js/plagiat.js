$('form').on('submit', function(e) {
    e.preventDefault();

    let data = $(this).serialize();
    $.ajax({
        url: 'program/proses',
        method: 'POST',
        dataType: 'JSON',
        data,
        success: function(data) {
            
            if (!data.status) {
                return alert('isi semua inputan'); 
            }
            $('.form-tes').hide('fast');
            $('.hasil').show('slow');

            data = data.data;
            $('.judul1 .sub').html($('#judul1').val())
            $('.judul2 .sub').html($('#judul2').val())
            $('.judul1 #n-gram').val(data.judul1.n_gram);
            $('.judul1 #rolling-hash').val(data.judul1.rolling_hash);
            $('.judul1 #window').val(data.judul1.window);
            $('.judul1 #fp').val(data.judul1.finger_print);
            $('.judul2 #n-gram').val(data.judul2.n_gram);
            $('.judul2 #rolling-hash').val(data.judul2.rolling_hash);
            $('.judul2 #window').val(data.judul2.window);
            $('.judul2 #fp').val(data.judul2.finger_print);

            $('#fp1').html(`<span class="badge">${data.judul1.count_finger}</span>`)
            $('#fp2').html(`<span class="badge">${data.judul2.count_finger}</span>`)
            $('#union').html(`<span class="badge">${data.count_union}</span>`)
            $('#intersection').html(`<span class="badge">${data.count_intersect}</span>`)
            $('#persentase').html(`<span class="badge bg-red">${data.jaccard}%</span>`)

        },
        error: function(er) {
            alert('Ada kesalahan.')
        }
    })

})

$('#proses-ulang').on('click', function() {
    $('.form-tes').show('fast');
    $('.hasil').hide();
})