<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Enter PIN </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS.css">
  </head>

  <body>
  	<form action="gen_type.php?client=<?php echo $_GET["client"]?>&room=<?php echo $_GET["in_room"]?>" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation">
  	<div class="container">
  		<h2>แบบทดสอบ The Myers – Briggs Type Indicator : MBTI</h2>
				<h2>1.ข้าพเจ้าชอบที่จะ</h2>
				<input name="1" type="radio" value = 'a'> <label>แก้ปัญหาใหม่ ๆ ที่มีความสลับซับซ้อน</label><br>
				<input name="1" type="radio" value = 'b'> <label>เลือกทำงานที่เคยทำสำเร็จมาแล้ว</label><br><br>

				<h2>2.ข้าพเจ้าชอบหัวหน้าที่</h2>
				<input name="2" type="radio" value='a'> <label>ได้สร้างและกำหนดเกณฑ์การทำงานและการตัดสินใจไว้ให้แล้ว</label><br>
				<input name="2" type="radio" value='b'> <label>ใส่ใจต่อความต้องการและช่วยเหลือลูกน้องรายบุคคล</label><br><br>

				<h2>3.เมื่อข้าพเจ้าทำงานเกี่ยวกับโครงการ ข้าพเจ้าต้องการ</h2>
				<input name="3" type="radio" value='a'> <label>ทำให้เสร็จและปิดโครงการทันที</label><br>
				<input name="3" type="radio" value='b'> <label>ไม่รีบปิดโครงการเผื่อไว้หากต้องปรับปรุงเปลี่ยนแปลง</label><br><br>

				<h2>4.เมื่อต้องตัดสินใจ สิ่งสำคัญที่สุดที่ต้องคำนึงถึง คือ</h2>
				<input name="4" type="radio" value='a'> <label>การคิดเชิงเหตุผล การมีข้อมูลและความคิดเห็น</label><br>
				<input name="4" type="radio" value='b'> <label>ความรู้สึกและค่านิยมของคน</label><br><br>

				<h2>5.ข้าพเจ้ามักจะ ...</h2>
				<input name="5" type="radio" value='a'> <label>จัดทำรายการและแผนการทำงานก่อนที่จะเริ่มต้นทำงาน และไม่พอใจอย่างยิ่งถ้าปรับเปลี่ยนไปจากแผนที่กำหนดไว้นี้</label><br>
				<input name="5" type="radio" value='b'> <label>หลีกเลี่ยงการทำแผนแต่จะปล่อยให้งานคืบหน้าไปเองขณะที่ทำงานนั้น</label><br><br>

				<h2>6.เมื่ออภิปรายปัญหากับเพื่อน  ข้าพเจ้าสามารถ ...</h2>
				<input name="6" type="radio" value="a"> <label>มองเห็นภาพรวมได้โดยง่าย</label><br>
				<input name="6" type="radio" value="b"> <label>เข้าใจจุดใดจุดหนึ่งของสถานการณ์นั้นได้อย่างลึกซึ้งได้โดยง่าย</label><br><br>

				<h2>7.คำใดที่อธิบายตรงกับตัวข้าพเจ้าได้ดีกว่ากัน ระหว่าง ...</h2>
				<input name="7" type="radio" value="a"> <label>การวิเคราะห์ (analytical)</label><br>
				<input name="7" type="radio" value="b"> <label>ความเข้าอกเข้าใจ (empathetic)</label><br><br>

				<h2>8.เมื่อต้องทำงานโครงการ ข้าพเจ้ามักจะ ...</h2>
				<input name="8" type="radio" value="a"> <label>ตีกรอบงานให้แคบลง เพื่อที่จะมองเห็นภาพได้ชัดเจนและตรงประเด็นยิ่งขึ้น</label><br>
				<input name="8" type="radio" value="b"> <label>ขยายขอบเขตงานออกไป เพื่อให้สามารถครอบคลุมประเด็นที่เกี่ยวข้องได้ครบ</label><br><br>

				<h2>9.เมื่อข้าพเจ้าจำเป็นต้องตัดสินใจโดยเร่งด่วน ข้าพเจ้ามัก ...</h2>
				<input name="9" type="radio" value="a"> <label>รู้สึกอึดอัดใจและอยากได้ข้อมูลเพิ่มเติม</label><br>
				<input name="9" type="radio" value="b"> <label>สามารถตัดสินใจได้จากข้อมูลเท่าที่มีอยู่</label><br><br>

				<h2>10.ในการประชุม ข้าพเจ้ามักถูกรบกวนให้รำคาญใจกับคนที่ ...</h2>
				<input name="10" type="radio" value="a"> <label>ชอบเสนอความคิดมากมายที่ยังขาดความชัดเจน</label><br>
				<input name="10" type="radio" value="b"> <label>ทำให้เสียเวลาที่ประชุมไปกับการพูดถึงรายละเอียดของการทำงานอย่างถี่ยิบ</label><br><br>

				<h2>11.รูปแบบการเตรียมพร้อมก่อนเข้าร่วมประชุมของข้าพเจ้า คือ</h2>
				<input name="11" type="radio" value="a"> <label>อยากเข้าประชุมและได้แสดงความคิดเห็นต่อที่ประชุม</label><br>
				<input name="11" type="radio" value="b"> <label>เตรียมตัวพร้อมเต็มที่ และขีดเขียนวาระหัวข้อการประชุมนั้นออกมา</label><br><br>

				<h2>12.ในที่ประชุมข้าพเจ้าชอบคนที่ ...</h2>
				<input name="12" type="radio" value="a"> <label>สามารถแสดงออกทางอารมณ์ได้ดี</label><br>
				<input name="12" type="radio" value="b"> <label>ให้ความสำคัญกับงาน</label><br><br>

				<h2>13.ข้าพเจ้าชอบการทำงานกับหน่วยงานที่ ...</h2>
				<input name="13" type="radio" value="a"> <label>กระตุ้นการใช้ปัญญาในการทำงานให้กับข้าพเจ้า</label><br>
				<input name="13" type="radio" value="b"> <label>ข้าพเจ้าผูกพันกับเป้าหมายและพันธกิจ</label><br><br>

				<h2>14.ช่วงสุดสัปดาห์ ข้าพเจ้ามักจะ ...</h2>
				<input name="14" type="radio" value="a"> <label>วางแผนล่วงหน้าว่าจะทำอะไรบ้าง</label><br>
				<input name="14" type="radio" value="b"> <label>ไปดูว่ามีอะไรเกิดขึ้นบ้าง แล้วจึงตัดสินใจเข้าร่วมตามนั้น</label><br><br>

				<h2>15.ข้าพเจ้าชอบทำงานกับหัวหน้าที่ ...</h2>
				<input name="15" type="radio" value="a"> <label>เต็มไปด้วยความคิดใหม่ ๆ</label><br>
				<input name="15" type="radio" value="b"> <label>เป็นนักปฏิบัติที่ดี</label><br><br>
				
  	</div>
    <center><button type="submit" class="btn join" >Next </button></center>
	</form>
	<br>
	<center> <button type="button" class="btn create" onclick="window.location.href='client.php'">Back</button> </center>
	<br><br>
  </body>
</html>