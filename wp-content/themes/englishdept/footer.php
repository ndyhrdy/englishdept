		<div class="footer">
			<div class="row">
				<div class="col-md-3">
					<h4>
						English Department<br />
						<span class="text-uppercase small">Universitas Hasanuddin</span>
					</h4>
					<p>
						Fakultas Ilmu Budaya<br />
						Jl. Perintis Kemerdekaan, KM.10<br />
						Tamalanrea, Makassar
					</p>
				</div>
				<?php dynamic_sidebar('englishdept-footer-sidebar') ?>
			</div>
		</div>
		<div class="footer-foot">
			<div class="row hidden-xs">
				<div class="col-sm-6">
					<p class="text-muted small">&copy; 2016 English Department - Universitas Hasanuddin. All rights reserved.</p>
				</div>
				<div class="col-sm-6"></div>
			</div>
		</div>
	</div>
	<?php wp_footer() ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$('[data-toggle=tooltip]').tooltip();
		});
	</script>
</body>
</html>