<?php include 'Components/Header/header.php'; ?>


<div class="p-3 d-flex container">
	<img src="logo2.png" alt="MPSC Skill Test Logo" class="img-fluid"
		style="max-width: 130px; object-fit: contain; padding: 0; margin: 0; border: none;">
</div>

<div>

	<div class="container mt-2">
		<!-- WILL DISPLAY THE TEXT AND CHANGE COLOR ACC -->
		<!-- <button type="button" class="btn btn-danger mb-3" onclick="window.location.reload();">New Passage</button> -->

		<div class="row">
			<div class="col-md-8">
				<div class="text-end">
					<label for="passageSelect">
						<b>Select Passage</b>
					</label>
					<select id="passageSelect" class="border rounded mb-3 w-6">
						<option value="1" selected="selected">Passage 1</option>
						<option value="2">Passage 2</option>
						<option value="3">Passage 3</option>
						<!--<option value="4">Passage 4</option>-->
						<!--<option value="5">Passage 5</option>-->
						<!--<option value="6">Passage 6</option>-->
						<!--<option value="7">Passage 7</option>-->
						<!--<option value="8">Passage 8</option>-->
						<!--<option value="9">Passage 9</option>-->
						<!--<option value="10">Passage 10</option>-->
						<!--<option value="11">Passage 11</option>-->
						<!--<option value="12">Passage 12</option>-->
						<!--<option value="13">Passage 13</option>-->
						<!--<option value="14">Passage 14</option>-->
						<!--<option value="15">Passage 15</option>-->
						<!--<option value="16">Passage 16</option>-->
						<!--<option value="17">Passage 17</option>-->
						<!--<option value="18">Passage 18</option>-->
						<!--<option value="19">Passage 19</option>-->
						<!--<option value="20">Passage 20</option>-->
						<!--<option value="21">Passage 21</option>-->
						<!--<option value="22">Passage 22</option>-->
						<!--<option value="23">Passage 23</option>-->
						<!--<option value="24">Passage 24</option>-->
						<!--<option value="25">Passage 25</option>-->
						<!--<option value="26">Passage 26</option>-->
						<!--<option value="27">Passage 27</option>-->
						<!--<option value="28">Passage 28</option>-->
						<!--<option value="29">Passage 29</option>-->
						<!--<option value="30">Passage 30</option>-->
						<!--<option value="31">Passage 31</option>-->
						<!--<option value="32">Passage 32</option>-->
						<!--<option value="33">Passage 33</option>-->
						<!--<option value="34">Passage 34</option>-->
						<!--<option value="35">Passage 35</option>-->
						<!--<option value="36">Passage 36</option>-->
						<!--<option value="37">Passage 37</option>-->
						<!--<option value="38">Passage 38</option>-->
						<!--<option value="39">Passage 39</option>-->
						<!--<option value="40">Passage 40</option>-->
						<!--<option value="41">Passage 41</option>-->
						<!--<option value="42">Passage 42</option>-->
						<!--<option value="43">Passage 43</option>-->
						<!--<option value="44">Passage 44</option>-->
						<!--<option value="45">Passage 45</option>-->
						<!--<option value="46">Passage 46</option>-->
						<!--<option value="47">Passage 47</option>-->
						<!--<option value="48">Passage 48</option>-->
						<!--<option value="49">Passage 49</option>-->
						<!--<option value="50">Passage 50</option>-->
						<!--<option value="51">Passage 51</option>-->
						<!--<option value="52">Passage 52</option>-->
						<!--<option value="53">Passage 53</option>-->
						<!--<option value="54">Passage 54</option>-->
						<!--<option value="55">Passage 55</option>-->
						<!--<option value="56">Passage 56</option>-->
						<!--<option value="57">Passage 57</option>-->
						<!--<option value="58">Passage 58</option>-->
						<!--<option value="59">Passage 59</option>-->
						<!--<option value="60">Passage 60</option>-->
						<!--<option value="61">Passage 61</option>-->
						<!--<option value="62">Passage 62</option>-->
						<!--<option value="63">Passage 63</option>-->
						<!--<option value="64">Passage 64</option>-->
						<!--<option value="65">Passage 65</option>-->
						<!--<option value="66">Passage 66</option>-->
						<!--<option value="67">Passage 67</option>-->
						<!--<option value="68">Passage 68</option>-->
						<!--<option value="69">Passage 69</option>-->
						<!--<option value="70">Passage 70</option>-->



						<!-- Add more options as needed -->
					</select>
				</div>

				<div id="result" class="p-3 border rounded"
					style="overflow-y: scroll; max-height: 170px;text-align: justify;">

				</div>

				<!-- TEXTAREA FOR USERINPUT -->
				<div class="mt-4">
					<div class="form-floating rounded" style="border: 1px solid #16235E; color: #16235E;">
						<textarea class="form-control p-3 " id="UserInput" spellcheck="false"
							style="height: 170px; overflow-y: scroll;"></textarea>
						<!-- <label for="UserInput" class="">Please Start Typing Here...</label> -->
					</div>
					<div class="btns">
						<button class="btn mt-3" style="border: 1px solid #16235E; color: #16235E;"
							onclick="compareEnglishPassages()">Submit</button>
						<button class="btn mt-3" style="background-color: #16235E; color: white "
							onclick="openSubscribePage()">Try Subscription at Rs.99</button>
					</div>
				</div>
			</div>


			<!-- NEW  -->

			<div class="col-md-4 d-md-flex justify-content-end mt-2">

				<div class="row" style="max-width:80%; min-width:100%">
					<div>
						<div class="p-0  d-md-block">
							<h5 class="  p-2 " style="border: 1px solid #16235E; border-radius:10px">
								<label for="time">Time : <span id="countdown" class="mx-2">10:00</span></label>
							</h5>
						</div>
						<div class="container p-3 mt-2 " style="border: 1px solid #16235E; border-radius:10px">
							<div class="d-flex justify-content-between pb-3 border-bottom">
								<span>Language:</span>
								<span id="selected_language" class="fw-bold"></span>
							</div>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<span>Keystrokes Count:</span>
								<span id="keystroke" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<span>Error Count:</span>
								<span id="mistakes" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<span>Backspace Count:</span>
								<span id="backspace" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<span>Total Word Count:</span>
								<span id="contLength" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-2 border-bottom">
								<span>Typed Word Count:</span>
								<span id="typedWordCount" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-3 border-bottom">
								<span class>Pending Word Count:</span>
								<span id="pendingWordCount" class="fw-bold">0</span>
							</div>
							<div class="d-flex justify-content-between py-2">
								<span>Accuracy:</span>
								<span id="accuracyCount" class="fw-bold">0</span>
							</div>
						</div>

					</div>
				</div>
			</div>

			<!-- Result Modal -->
			<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content text-center">
						<div class="modal-body p-4">
							<img src="logo2.png" alt="Logo" class="mb-3" style="max-width: 100px;" />
							<h5 class="mb-3">Typing Test Result</h5>

							<!-- Your Stats Card Inside Modal -->
							<div class="container p-3 mt-2" style="border: 1px solid #16235E; border-radius:10px">
								<div class="d-flex justify-content-between pb-3 border-bottom">
									<span>Language:</span>
									<span id="modal_selected_language" class="fw-bold"></span>
								</div>
								<div class="d-flex justify-content-between py-2 border-bottom">
									<span>Keystrokes Count:</span>
									<span id="modal_keystroke" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-2 border-bottom">
									<span>Error Count:</span>
									<span id="modal_mistakes" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-2 border-bottom">
									<span>Backspace Count:</span>
									<span id="modal_backspace" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-2 border-bottom">
									<span>Total Word Count:</span>
									<span id="modal_contLength" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-2 border-bottom">
									<span>Typed Word Count:</span>
									<span id="modal_typedWordCount" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-3 border-bottom">
									<span>Pending Word Count:</span>
									<span id="modal_pendingWordCount" class="fw-bold">0</span>
								</div>
								<div class="d-flex justify-content-between py-2">
									<span>Accuracy:</span>
									<span id="modal_accuracyCount" class="fw-bold">0</span>
								</div>
							</div>

							<div class="d-flex justify-content-center gap-3 mt-4">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<a href="https://mpscskilltest.in/signup" class="btn btn-primary">Sign Up Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-body p-4">
				<img src="logo2.png" alt="Logo" class="mb-3" style="max-width: 100px;" />
				<h5 class="mb-3">Typing Test Result</h5>
				<div class="container p-3 mt-2" style="border: 1px solid #16235E; border-radius:10px">
					<div class="d-flex justify-content-between pb-3 border-bottom">
						<span>Language:</span>
						<span id="modal_selected_language" class="fw-bold"></span>
					</div>
					<div class="d-flex justify-content-between py-2 border-bottom">
						<span>Keystrokes Count:</span>
						<span id="modal_keystroke" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-2 border-bottom">
						<span>Error Count:</span>
						<span id="modal_mistakes" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-2 border-bottom">
						<span>Backspace Count:</span>
						<span id="modal_backspace" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-2 border-bottom">
						<span>Total Word Count:</span>
						<span id="modal_contLength" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-2 border-bottom">
						<span>Typed Word Count:</span>
						<span id="modal_typedWordCount" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-3 border-bottom">
						<span>Pending Word Count:</span>
						<span id="modal_pendingWordCount" class="fw-bold">0</span>
					</div>
					<div class="d-flex justify-content-between py-2">
						<span>Accuracy:</span>
						<span id="modal_accuracyCount" class="fw-bold">0</span>
					</div>
				</div>
				<div class="d-flex justify-content-center gap-3 mt-4">
					<button type="button" style="border: 1px solid #16235E; color: #16235E;" data-bs-dismiss="modal">Close</button>
					<a href="https://mpscskilltest.in/signup" style="border: 1px solid #16235E; background: #16235E;">Sign Up Now</a>
				</div>
			</div>
		</div>
	</div>
</div>







<!-- <script src="Externaljs/19-02.js"></script> -->
<script src="Externaljs/minified_code/getpassageutils_min.js"></script>
<script src="Externaljs/mp_270324.js"></script>
<script src="Externaljs/ep_270324.js"></script>
<script src="Externaljs/minified_code/diff_min.js"></script>
<script src="Externaljs/minified_code/main_min(270324).js"></script>


<script>
function showResultModal() {
	document.getElementById("modal_selected_language").innerText = document.getElementById("selected_language").innerText;
	document.getElementById("modal_keystroke").innerText = document.getElementById("keystroke").innerText;
	document.getElementById("modal_mistakes").innerText = document.getElementById("mistakes").innerText;
	document.getElementById("modal_backspace").innerText = document.getElementById("backspace").innerText;
	document.getElementById("modal_contLength").innerText = document.getElementById("contLength").innerText;
	document.getElementById("modal_typedWordCount").innerText = document.getElementById("typedWordCount").innerText;
	document.getElementById("modal_pendingWordCount").innerText = document.getElementById("pendingWordCount").innerText;
	document.getElementById("modal_accuracyCount").innerText = document.getElementById("accuracyCount").innerText;

	const modal = new bootstrap.Modal(document.getElementById('resultModal'));
	modal.show();
}
</script>

<script type="text/javascript">
	const passageSelect = document.getElementById("passageSelect");
	document.addEventListener('DOMContentLoaded', function () {
		const urlParams = new URLSearchParams(window.location.search);
		const param1 = urlParams.get('param1'); // Get value of param1
		// const param2 = urlParams.get('param2'); // Get value of param2
		document.getElementById('selected_language').innerText = param1;
		// document.getElementById('selected_speed').innerText = param2;
		getc(param1, 1);
	});
	passageSelect.addEventListener("change", function () {

		const urlParams = new URLSearchParams(window.location.search);
		const param1 = urlParams.get('param1'); // Get value of param1

		document.getElementById('selected_language').innerText = param1;

		const selectedPassageNumber = parseInt(this.value);
		//renderNewQuote(param1, selectedPassageNumber);
		console.log("Event Listener method is called.");

		getc(param1, selectedPassageNumber);
	});
	function openSubscribePage() {
		// Change the URL to the page you want to open
		var newPageUrl = "https://mpscskilltest.in/signup";

		// Open the new page in a new tab
		window.open(newPageUrl, "_blank");
	}

</script>
<?php include 'Components/Footer/footer.php'; ?>