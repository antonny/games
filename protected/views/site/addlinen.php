<script type="text/javascript">
$(document).ready(function(){
	/*$('form').submit(function(){
		alert($('input[type=text]:eq(0)').val());
	if(             ($('input[type=text]:eq(0)').val()=='')||($('input[type=text]:eq(1)').val()=='')||($('input[type=text]:eq(2)').val()=='')||($('input[type=text]:eq(3)').val()=='')||($('input[type=text]:eq(4)').val()=='')                )
	{
		return false;
		}
	
	});*/alert('');
});
</script>
<form action="formfabric.php" method="get">
<input type="text" name="fabric_name" value=""> Название ткани <br>
<input type="text" name="thickness"  value=""> Толщина <br>
<input type="text" name="fabric_length"  value=""> Длинна <br>
<input type="text" name="fabric_width"  value=""> Ширина <br>
<input type="text" name="color"  value=""> Цвет <br>
<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="">
<input type="submit" value="ok">
</form>