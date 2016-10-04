<br />
<form action="<?php bloginfo('url') ?>" method="post" accept-charset="utf-8">
	<div class="form-group row">
		<div class="col-lg-6">
			<label class="control-label">Full Name</label>
			<input type="text" name="name" class="form-control" autofocus />
		</div>
	</div>
	<div class="form-group row">
		<div class="col-lg-6">
			<label class="control-label">Email</label>
			<input type="email" name="name" class="form-control" />
			<span class="help-block">Please provide a valid email so we can get back to you.</span>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-lg-9">
			<label class="control-label">Your Message</label>
			<textarea name="message" class="form-control" rows="5"></textarea>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>