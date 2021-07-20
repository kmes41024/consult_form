$("#contactwModal").modal({backdrop:'static',show:true,keyboard:false});
		
function onSend()
{
	$.ajax({  
		type: "POST",   //提交的方法
		datatype:"json",
		url:"ajaxForm.php", //提交的地址  
		data:$('#contactForm').serialize(),// 序列化表单值  
		success: function(data) {  //成功
			console.log(data.state);  //就将返回的数据显示出来
			if (data.state == 'success')
			{
				layui.layer.msg('成功发送, 客服人员会在最短时间与您联系!!\r\n感谢您的留言',{time:5000});
				setTimeout(function(){$('#contactwModal').modal('hide');}, 5000);
			}
			else
			{
				layui.layer.alert('传送失败, 请确认内容后,重新发送一次');
			}
		},
		complete: function(data) {  //成功
			console.log(data);  //就将返回的数据显示出来
		}
	});

}