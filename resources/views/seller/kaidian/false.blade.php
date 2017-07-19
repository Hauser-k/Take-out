<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
	<script>
		alert('您填报的信息,未通过,请重新填写...');
		location.href = "{{ url('seller/xiugaikaidian') }}";
	</script>
	
</body>
</html>