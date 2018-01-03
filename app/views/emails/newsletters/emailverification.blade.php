<!DOCTYPE HTML>
<html>
<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta name=\"viewport\" content=\"width=device-width\"/>
	<title>Forgot Password</title>
</head>
<body 0="">





<table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" width="640">
	<tbody>
		<tr>
			<td style="padding:40px">
			<table border="0" cellpadding="0" cellspacing="0" style="0" width="0">
				<tbody>
					<tr>
						<td><img alt="Header" height="148" src="{{URL::to('')}}/{{$logo}}" style="margin:0px; padding:0px; border:none;" width="250" /></td>
					</tr>
					<tr>
						<td valign="top">
						<table 0="" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td colspan="2">
									<h3 style="padding:10px">Verifiy Your Email</h3>

									<p style="padding:10px"><strong>Dear {{$name}},</strong></p>

									<p style="padding:0px 15px">Click the link below to verify your email address.</p>
									
									
									

									<p  style="padding:0px 15px"><strong>Email :</strong> {{$email}}<br />
									<br />
					<strong>Link :</strong> <a href="{{URL::to('project/sendverification/confirm/')}}/{{$id}}/{{$code}}">click here</a></p>
									</td>
								</tr>
								<tr>
									<td valign="top">
									<h3  style="padding:0px 15px">Regards,</h3>

									<p  style="padding:0px 15px">{{$sendername}}</p>

									<p  style="padding:0px 15px"><i>{{$senderemail}}</i></p>
									</td>
									<td valign="top">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>
