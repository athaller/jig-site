<div class="flex justify-center lg:-mx-12 my-12 p-6 md:px-12 bg-grey-lighter border border-grey-light text-sm md:rounded shadow">
    <!-- Begin Quote-Of-The-Day Block -->
    <div id="qotd_block">
            <div id="quote">
                <h2>Be Inspired!</h2>
            </div>
    </div>
    <!--End Quote-Of-The-Day Block -->
</div>

@push('scripts')
<script>


var getJSON = function(url, successHandler, errorHandler) {
	var xhr = typeof XMLHttpRequest != 'undefined'
		? new XMLHttpRequest()
		: new ActiveXObject('Microsoft.XMLHTTP');
	xhr.open('get', url, true);
	xhr.responseType = 'json';
	xhr.onreadystatechange = function() {
		var status;
		var data;
		// https://xhr.spec.whatwg.org/#dom-xmlhttprequest-readystate
		if (xhr.readyState == 4) { // `DONE`
			status = xhr.status;
			if (status == 200) {
				successHandler && successHandler(xhr.response);
			} else {
				errorHandler && errorHandler(status);
			}
		}
	};
	xhr.send();
};


window.onload = function() {

getJSON('https://quotes.rest/qod.json', function(data) {
    window._qotd = {
        'data': data
    };
    document.getElementById("quote").innerHTML = "<h1>" + data.contents.quotes[0].title + "</h1><p>" + data.contents.quotes[0].quote + "</p>";
}, function(status) {
	console.log('Failed to fetch QOTD.');
});

}
    </script>
@endpush
