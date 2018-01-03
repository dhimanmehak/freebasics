<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>Forgot Password</title>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0">
<table width="640" border="0" cellspacing="0" cellpadding="0" bgcolor="#7da2c1">
<tr>
	<td style="padding:40px;">
		<table width="610" border="0" cellpadding="0" cellspacing="0" style="border:#1d4567 1px solid; font-family:Arial, Helvetica, sans-serif;">
		
		<tr>
			<td valign="top">
				<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td colspan="2">
						<p style="padding:10px 15px 10px 15px; font-size:14px; margin:0px;">
							<strong>Dear {{$name}},</strong>
						</p>
						<p style="padding:0px 15px 10px 15px; font-size:12px; margin:0px;">
							<strong>Click the url to reset your password!</strong>
						</p>
						<table border="0" cellspacing="0" cellpadding="5" style="margin:10px 15px; font-size:12px;">
						<tr>
							<td width="25%" align="right">
								<strong>Name:</strong>
							</td>
							<td width="61%">
								{{$name}}
							</td>
							
						</tr>
						
						<tr>
							<td align="right">
								<strong>Email:</strong>
							</td>
							<td>
								{{$email}}
							</td>
						</tr>
						<tr>
							<td align="right">
								<strong>Url:</strong>
							</td>
							<td>
								<a href="{{URL::to('adminresetforgotpassword?id=')}}{{$id}}">{{URL::to('adminresetforgotpassword?id=')}}{{$id}}</a>
							</td>
						</tr>
						</table>
						
					</td>
				</tr>
				<tr>
					
					<td width="50%" valign="top" style="font-size:12px; padding:10px 15px;">
						<p>
							 If you have any questions, check out our <a href="#"><strong>documentation</strong></a> or send them our way via <a href="#"><strong>support.</strong></a>
						</p>
						<p>
							<strong>- The website Team</strong>
						</p>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>