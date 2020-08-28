
<form method="POST" action="http://www.phpmind.com">
 <input type="checkbox" name="checkbox" value="check"  />
 <input type="submit" name="submit" value="submit" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}"  />
</form>

<form method="POST" action="http://www.phpmind.com">
...
<p><input id="field_terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
<p><input type="submit"></p>
</form>

<script>

  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");

</script>

# symptomchecker
<a href="http://priaid.com" target="_blank">priaid.com</a> (under the subbrand <a href="http://apimedic.com" target="_blank">ApiMedic.com</a>) offers a medical symptom checker primarily for patients. Based on the entered symptoms it tells you what possible diseases you have. It directs you to more medical information and shows you the right doctor for further clarifications. The symptom checker can be integrated via the flexible API (Application Programming Interface). You can find here code examples (SDK) for a symptom checker.<br>In the following you can access the Standard License Agreement for the Symptom Checker API (<a href="http://apimedic.com" target="_blank">ApiMedic.com</a>), which includes the latest End User Terms and Privacy Policy for your application: <a href="https://apimedic.net/standard-license-agreement.html" target="_blank">Symptom Checker API License Agreement</a>