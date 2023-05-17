<div id="virtual" style="margin-bottom: 3em; margin-top: 3em;">
      <div style="display: flex; justify-content: center; align-items: center;">
      <h2 style="text-align: center; width: 20%; opacity: 0.8; color: #0C375A; padding-bottom: 0.7rem;"> Virtual Consultation</h2>
      </div>
       <div class="c">   
      <input type="checkbox" id="faq-1">
      <h1><label for="faq-1">What Is Virtual Consultation?</label></h1>
      <div class="p">
        <p> &nbsp; &nbsp; &nbsp; &nbsp; It enables you to have a real-time consultation via video conferencing technology using your smartphone, tablet, laptor or PC at your comfort home with your pet. This method is only available if the doctor wishes to..</p>
      </div>
    </div>
    <div class="c">
      <input type="checkbox" id="faq-2">
      <h1><label for="faq-2">What is the benefit of virtual consultation?</label></h1>
      <div class="p">
        <p> <b> 1. &nbsp; Convenience:</b> Virtual consultation allows patients to receive medical care from the comfort of their own homes, without having to travel to a medical facility. This is particularly beneficial for patients who have mobility issues, live in rural or remote areas, or have busy schedules. <br><br>
        <b> 2. &nbsp; Reduced waiting times: </b>  With virtual consultation, patients can often receive medical care more quickly, without having to wait for an appointment or travel to a medical facility. This can be particularly important for patients who need urgent animal wellness attention.
        <br>
        <br>
        <b> 3. &nbsp; Improved communication: </b>  Virtual consultation can improve communication between patients and healthcare providers. It can allow for more frequent check-ins, easier access to medical records, and better coordination of care between multiple providers.
        <br>
        <br>
        <b> 4. &nbsp;  Cost-effective: </b>  Virtual consultation can be a cost-effective alternative to traditional in-person medical care. It can reduce the need for expensive medical tests and procedures, and can help prevent unnecessary emergency room visits
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Overall, virtual consultation has the potential to improve access to medical care, increase patient satisfaction, and reduce healthcare costs.
      </p>
      </div>
    </div>
    <div class="c">
      <input type="checkbox" id="faq-3">
      <h1><label for="faq-3">How it works?</label></h1>
      <div class="p">
        <p><b> Step 1: &nbsp; </b>Book an appointment for virtual consultation by clicking the button above and fill out the form and pay the amount fee <i>This mode is strictly payment first and <b> only available for Wellness care service.</b></i>
        <br>
        <br>
        <b> Step 2: &nbsp; </b> After filling out, please wait for the confimation email from our admin
        <br>
        <br>
        <b> Step 3: &nbsp; </b> After you receive the email, It contains a summary of your information and a <b> meeting link which is only accessible on the date and time you specified in the appointment form </b>
        <br>
        <br>
        <b> Step 4: &nbsp; </b> You can now wait for your schedule and enjoy talking to our available vets about the wellness of your pets. They can also provide prescriptions if necessary. <br> <b> Thankyou! </b>
        </p>
      </div>
    </div>
</div>

<style>
  /* @import url("https://fonts.googleapis.com/css?family=Poppins:400,400i,700"); */
*, *::after, *::before{
  margin: 0;
  padding: 0;
  box-sizing:border-box;
}
body{
  font-family: "Poppins", sans-serif;
}
div.c{
  position: relative;
  margin-left: 3em;
  margin-right: 3em;
  margin-top: 0.7rem;
  /* margin-bottom: 3em; */
}
.c input{
  position: absolute;
  left: 0;
  top: 0;
  /* height: 80%;
  width: 100%; */
  opacity:0;
  visibility: 0;
}
.c h1{
  background: #e4e9f7;
  /* color:white; */
  padding: .7em;
  opacity: 0.7;
  position: relative;
  font-size: 2rem;
}
.c label::before{
  content:"";
  /* background-color: black; */
  display: inline-block;
  border: 10px solid transparent;
  border-left:20px solid black;
}
/* .c label{
  cursor: pointer;
  position: relative;
  display: flex;
  align-items: center;
} */
div.p{
  max-height: 0px;
  overflow: hidden;
  transition:max-height 0.5s;
  background-color: white;
  box-shadow:0 0 10px 0 rgba(0, 0, 0, 0.2);
  margin-bottom: 1em;
}
div.p p {
  padding: 0.3em;
}
/* input:checked ~ h1 label::before{
  border-left:15px solid transparent;
  border-top:20px solid white;
  margin-top:5px;
  margin-right:10px;
} */
input:checked ~ h1 ~ div.p{
  max-height: 100%;
}

</style>