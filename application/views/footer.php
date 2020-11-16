<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
	$(document).ready( function () {
    $('#tablekabupaten').DataTable();
} );

	$(document).ready( function () {
    $('#tableprovinsi').DataTable();
} );

	$("#selectProvinsi").select2({
		placeholder: 'Pilih Provinsi',
		language: 'id'
	})

	$("#selectKabupaten").select2({
		placeholder: 'Pilih Kabupaten',
		language: 'id'
	})

	$("#selectProvinsi").change(function(){
            $("#selectKabupaten").select2({
                placeholder: 'Loading..',
                language: 'id'
            })
            const id = $(this).val();
            if (id=='semua') {
                $("#searching").submit()
            } else {
                $.ajax({
                url: "<?= base_url('kabupaten/getLocation'); ?>",
                type: "post",
                dataType: "json",
                async: true,
                data: {
                    id: id
                },
                success: function(data){
                    $("#selectKabupaten").select2({
                        placeholder: 'Pilih Kabupaten',
                        language: 'id'
                    })
                    $("#selectKabupaten").html(data);
                    
                }
            });
            }
        })


    $("#selectKabupaten").change(function(){
        $("#searching").submit()
    })

</script>
</body>
</html>