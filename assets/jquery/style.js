function ambilData(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost/penggajian/jabatan/fetch",
        success: function (data) {
            var tbody = "";
            for(var i in data){
                tbody += '<tr>'+
								'<td> '+ data[i].kode_jabatan +' </td>'+
								'<td> '+ data[i].jabatan +' </td>'+
                                '<td> '+ data[i].standar_gaji +' </td>'+
                                '<td> '+ data[i].keterangan +' </td>'+
								'<td><a href="javascript:void(0)" id="edit" value="'+data[i].kode_jabatan+'" data-target="#form_edit" data-toggle="modal" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a> <a id="del" value="'+data[i].kode_jabatan+'" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a></td>'+
							'</tr>';
            }
            $('#jabatan').html(tbody);
        }
    });
}

ambilData();

	function tambahJabatan() {
		var kode_jabatan = $("[name='kode_jabatan']").val();
		var jabatan = $("[name='jabatan']").val();
        var standar_gaji = $("[name='standar_gaji']").val();
        var keterangan = $("[name='keterangan']").val();

		$.ajax({
			type: 'POST',
			data: 'kode_jabatan='+kode_jabatan+'&jabatan='+jabatan+'&standar_gaji='+standar_gaji+'&keterangan='+keterangan,
			url: 'http://localhost/penggajian/jabatan/tambah',
			dataType: 'json',
			success: function(hasil){
				$('#pesan').html(hasil.pesan);

				if (hasil.pesan=='') {
					$("#form_tambah").modal('hide');
					ambilData();
                    $("[name='kode_jabatan']").val('');
                    $("[name='jabatan']").val('');
                    $("[name='standar_gaji']").val('');
                    $("[name='keterangan']").val('');
				}
			}
		});
	}

	$(document).on("click", "#edit", function(e) { 
		e.preventDefault();
		var edit_id = $(this).attr("value");
			$.ajax({
				type: 'POST',
				data: 'kode_jabatan='+edit_id,
				url: 'http://localhost/penggajian/jabatan/edit',
				dataType: 'json',
				success: function(hasil){
					$('[name="kode_jabatan_edit"]').val(hasil[0].kode_jabatan);
					$('[name="jabatan_edit"]').val(hasil[0].jabatan);
					$('[name="standar_gaji_edit"]').val(hasil[0].standar_gaji);
					$('[name="keterangan_edit"]').val(hasil[0].keterangan);
				}
			});
    });

	$(document).on("click", "#updateJabatan", function(e) { 
		e.preventDefault();
		var kode_jabatan_edit = $("[name='kode_jabatan_edit']").val();
		var jabatan_edit = $("[name='jabatan_edit']").val();
        var standar_gaji_edit = $("[name='standar_gaji_edit']").val();
        var keterangan_edit = $("[name='keterangan_edit']").val();

		$.ajax({
			type: 'POST',
			data: 'kode_jabatan_edit='+kode_jabatan_edit+'&jabatan_edit='+jabatan_edit+'&standar_gaji_edit='+standar_gaji_edit+'&keterangan_edit='+keterangan_edit,
			url: 'http://localhost/penggajian/jabatan/update',
			dataType: 'json',
			success: function(hasil){
				$('#pesan_edit').html(hasil.pesan);

				if (hasil.pesan=='') {
					$("#form_edit").modal('hide');
					ambilData();
				}
			}
		});
    });
    $(document).on("click", "#del", function(e){
		e.preventDefault();
		var del_id = $(this).attr("value");
		var tanya = confirm('Apakah anda sudah yakin ?');

		if (tanya) {
			$.ajax({
				type: 'POST',
				data: 'kode_jabatan='+del_id,
				url: 'http://localhost/penggajian/jabatan/hapus',
				dataType: 'json',
				success: function(){
					ambilData();
				}
			});
		}
	});