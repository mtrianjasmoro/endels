
<link href="<?= base_url('asset/'); ?>css/bootstrap.min.css" rel="stylesheet">
<link href='<?= base_url('asset/'); ?>css/fullcalendar.css' rel='stylesheet' />

<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="col-lg-12 text-center">
			<div id="calendar" class="col-centered">
			</div>
		</div>

	</div>
	<!-- /.row -->
	
	<!-- Modal -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" method="POST" action="editEventTitle.php">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Jadwal</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">					
							<div class="col-sm-10">
								<table>
									<tr>
										<td id="nama"></td>
									</tr>
									<tr>
										<td id="alamat"></td>
									</tr>
									<tr>
										<td id="nomor"></td>
									</tr>
								</table>
							</div>
						</div>		

					</div>
				</form>
			</div>
		</div>
	</div>

</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="<?= base_url('asset/'); ?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('asset/'); ?>js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='<?= base_url('asset/'); ?>js/moment.min.js'></script>
<script src='<?= base_url('asset/'); ?>js/fullcalendar.min.js'></script>

<script>

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
			},
			defaultDate: '2021-03-01',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #nama').text(event.title);
					$('#ModalEdit #alamat').text(event.alamat);					
					$('#ModalEdit #nomor').text(event.nomor);
					$('#ModalEdit').modal('show');
				});
			},
			events: [
			<?php foreach ($events as $ev) {?>
				{
					id: <?=$ev['id_booking']?>,
					title: '<?=$ev['nama_user']?>',
					start: '<?=$ev['tgl_booking']?>',
					end: '<?=date('Y-m-d', strtotime('+1 days', strtotime($ev['tgl_booking'])))?>',
					color: '#3e1415',
					nomor: '<?=$ev['nomor']?>',
					alamat:'<?=$ev['alamat'].' RT '.$ev['rt'].' RW '.$ev['rw'].' Kecamatan '.$ev['kecamatan']?>',
					
				},
			<?php }?>
			]
		});
		
	});

</script>


