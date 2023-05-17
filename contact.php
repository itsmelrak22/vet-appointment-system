
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<section>
		<form class="form" action="submit_message.php" method="post">
		<h2>CONTACT US</h2>
		<p type="Name:">
			<input type="text" id="name" name="name" placeholder="Write your name here.." required></input></p>
		<p type="Email:">
			<input type="email" id="email" name="email" placeholder="to Let us know how to contact you back.."></input></p>
		<p type ="Phone Number">
			<input type="tel" id="phone" name="phone" placeholder="thi is required" required></input></p>
		<p type="Message:">
			<input id="message" name="message" placeholder="What would you like to tell us.." required></input></p>
		<button type="submit" value="submit"> Send Message </button>

	<div>
	<span> <ion-icon name="call-outline"> </ion-icon> 0956 302 6013  </span>
	<span> <ion-icon name="mail-outline"></ion-icon> circleoflifedvm@gmail.com </span>
				
</div>
</section>
</form>

<style>
.form{
	width:340px;
	height:510px;
	background:#e6e6e6;
	border-radius:8px;
	box-shadow:0 0 40px -10px #000;
	margin:calc(50vh - 220px) auto;
	padding:20px 30px;
	max-width:calc(100vw - 40px);
	box-sizing: border-box;
	font-family:'Montserrat',sans-serif;
	position:relative;
}

h2{
	margin:10px 0;
	padding-bottom:10px;
	width:180px;
	color:#78788c;
	border-bottom:3px solid #78788c;
}
input{
	width:100%;
	padding:10px;
	box-sizing:border-box;
	background:none;
	outline:none;
	resize:none;
	border:0;
	font-family:'Montserrat',sans-serif;
	transition:all .3s;
	border-bottom:2px solid #bebed2
}
input:focus{
	border-bottom:2px solid #78788c
}
p:before{
	content:attr(type);
	display:block;
	margin:28px 0 0;
	font-size:14px;color:#5a5a5a
}
button{
	float:right;
	padding:8px 12px;
	margin:8px 0 0;
	font-family:'Montserrat',sans-serif;
	border:2px solid #78788c;
	background:0;
	color:#5a5a6e;
	cursor:pointer;
	transition:all .3s
}
button:hover{
	background:#78788c;
	color:#fff
}
div{
	position:absolute;
	bottom:-13px;
	right:-100px;
	background:#50505a;
	color: white;
	width: 370px;
	height: 20px;
	padding:16px 4px 16px 0;
	border-radius:6px;
	font-size:13px;
	box-shadow:10px 10px 40px -14px #000;
	
}
span{
	margin:0 5px 0 15px;
	}
</style>