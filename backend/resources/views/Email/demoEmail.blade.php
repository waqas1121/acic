<html>
    <head>
           <title>
        {{ $mailData['subject']}}
    </title>
    </head>
 

<body style="background-color: #f1d7a3; padding:45px;">
    <h1>Contact Form</h1>
<div style="display:flex">
   
<h4 style="color:#000000;font-size: 21px;"> First Name:  {{ $mailData['fname']}} </h4>
<h4 style="color:#000000;font-size: 21px;"> Email:  {{ $mailData['email']}} </h4>
<h4 style="color:#000000;font-size: 21px;"> Subject:  {{ $mailData['subject']}} </h4>
<h4 style="color:#000000;font-size: 21px;"> Message:  {{ $mailData['msg']}} </h4>

</div>





</body>
</html>