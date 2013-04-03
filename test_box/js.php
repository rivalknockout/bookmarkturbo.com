<!DOCTYPE HTML>
<html>
<head>
<style>



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>

<script>

var hoge = {
	foo : function(){
		this.bar();
	}
};

hoge.bar = function(){
	alert();
}


//Done
hoge.foo();


</script>
</body>
</html>