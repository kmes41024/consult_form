<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'encoding.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'db/conn.php');
	require_once($_SERVER['DOCUMENT_ROOT']."mail/sendmail.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'db/jsonResponse.php');
	session_start();

	
	$sqlAttr = array();
	
	$sqlAttr['f_type'] = '能才启适';
	$sqlAttr['f_company_name']=$_POST['f_company_name'];
	$sqlAttr['f_fullname']=$_POST['f_fullname'];
	$sqlAttr['f_mobile']=$_POST['f_mobile'];
	$sqlAttr['f_email']=$_POST['f_email'];
	$sqlAttr['f_qq']=$_POST['f_qq'];
	$sqlAttr['f_wechat']=$_POST['f_wechat'];
	$sqlAttr['f_request']=$_POST['f_request'];
	$sqlAttr['f_status'] = '未处理';
	$sqlAttr['f_addtime'] = date("Y-m-d H:i:s");
	$conn->insert('t_consult', $sqlAttr);
	
	$title = "企业能才启适咨询 - 来自 (".$sqlAttr['f_company_name'].")";	
	$body = "企业名称".$sqlAttr['f_company_name']."<BR/>";
	$body .= "联络人: ".$sqlAttr['f_fullname']."<BR/>";
	$body .= "手机: ".$sqlAttr['f_mobile']."<BR/>";
	$body .= "邮箱: ".$sqlAttr['f_email']."<BR/>";
	$body .= " QQ : ".$sqlAttr['f_qq']."<BR/>";
	$body .= "微信: ".$sqlAttr['f_wechat']."<BR/>";
	$body .= "咨询内容: ".$sqlAttr['f_request']."<BR/>";
	
	$resp = array('state'=>'success');
	echo json_encode($resp, JSON_UNESCAPED_UNICODE);
	exit;
?>