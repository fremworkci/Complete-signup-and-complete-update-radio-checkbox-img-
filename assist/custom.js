$(document).ready(function(){

	// for signup
	$("#signup_form").on("submit",function(e){
		e.preventDefault();
		var name=$("#name").val();
		var email=$("#email").val();
		var password=$("#password").val();
		var mobile=$("#mobile").val();
		var gender=$("#gender").val();
		var qualification=$("#qualification").val();
		var pic=$("#pic").val();

		var name_check=/^[A-Za-z. ]{3,20}$/;
		var email_check=/^[A-Za-z0-9_]{3,20}@[A-Za-z]{3,}[.]{1}[A-Za-z]{3,16}$/;
		var password_check=/^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{5,15}$/;
		var mobile_check=/^[9876][0-9]{9}$/;
		var pic_check=/^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/; 

		if(!name_check.test(name))
		{
			$("#name_err").html('Please Check Name');
		}
		if(!email_check.test(email))
		{
			$("#email_err").html('*Invalid Email');
		}
		if(!password_check.test(password))
		{
			$("#password_err").html('*Password No Valid(ex:Admin@123)');
		}
		if(!mobile_check.test(mobile))
		{
			$("#mobile_err").html('*Invalid Mobile Number');
		}
		if(!pic_check.test(pic))
		{
			$("#pic_err").html('*Invalid Image');
		}

		if((name_check.test(name)) && (email_check.test(email)) && (password_check.test(password)) && (mobile_check.test(mobile)) && (pic_check.test(pic)))
		{
			$("#name_err").hide();
			$("#email_err").hide();
			$("#password_err").hide();
			$("#mobile_err").hide();
			$("#pic_err").hide();
			var url=BASE_URL+'Home/signup';
			$.ajax({
				url : url,
				type: 'POST',
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					$("#signup_form").trigger('reset');
					$("#msg").html("Insert Success");
					// console.log(data);
				}
			});
		}
	});


	// for display
	function show()
	{
		var url=BASE_URL+'Home/show';
		$.ajax({
			url : url,
			type: 'GET',
			success:function(data)
			{
				var jdata=JSON.parse(data);
				var length=jdata.length;
				var html="";
				var i;
				for(i=0;i<length;i++)
				{
					var img="<img src='"+BASE_URL+'img/'+jdata[i].pic+"' style='width:80px; height:80px;'>";
					html+="<tr>"+
					"<td>"+jdata[i].id+"</td>"+
					"<td>"+jdata[i].name+"</td>"+
					"<td>"+jdata[i].email+"</td>"+
					"<td>"+jdata[i].mobile+"</td>"+
					"<td>"+jdata[i].gender+"</td>"+
					"<td>"+jdata[i].qualification+"</td>"+
					"<td>"+img+"</td>"+
					"<td><button class='btn btn-info' id='edit' data-eid='"+jdata[i].id+"'>Edit</button></td>"+
					"<td><button class='btn btn-danger' id='delete' data-did='"+jdata[i].id+"'>Delete</button></td>"+
					"<tr>";
				}
				$("#mytable").append(html);
			}
		});
	}
	show()


	//for edit model
	$(document).on("click","#edit",function(){
		var id=$(this).attr('data-eid');
		$("#modal").show();
		var url=BASE_URL+'Home/edit';
		$.ajax({
			url : url,
			type : 'POST',
			data:{id:id},
			success:function(data)
			{
				var jdata=JSON.parse(data);
				$("#e_id").val(jdata[0].id);
				$("#e_name").val(jdata[0].name);
				$("#e_email").val(jdata[0].email);
				$("#e_mobile").val(jdata[0].mobile);
				//for image update
				$("#e_oldpic").val(jdata[0].pic);
				var img="<img src='"+BASE_URL+'img/'+jdata[0].pic+"' style='width:80px;'>";
				$("#oldpic").html(img);//only for display

				// for radio update
				if(jdata[0].gender=="Male")
				{
					$("#e_gender1").attr("checked",true);
				}
				if(jdata[0].gender=="Female")
				{
					$("#e_gender2").attr("checked",true);
				}
				//for checkbox(indexOf return index if not found then return -1)
				var q=jdata[0].qualification;
				if(q.indexOf('MCA')!='-1')
				{
					$("#e_q1").attr("checked",true);
				}
				if(q.indexOf('BCA')!='-1')
				{
					$("#e_q2").attr("checked",true);
				}
				if(q.indexOf('B.Tech')!='-1')
				{
					$("#e_q3").attr("checked",true);
				}
			}
		});
	});


	//for update form
	$("#edit_form").on("submit",function(e){
		e.preventDefault();
		var url=BASE_URL+'Home/update';
		$.ajax({
			url : url,
			type: 'POST',
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				$("#modal").hide();
				show();
			}
		});
	});
});