const RECONNECT_DELAY = 5000;

let ws;
//Initial connection attempt
connectWebSocket();

async function connectWebSocket() {
	ws = new WebSocket("ws://127.0.0.1:3500/ws/");

	ws.onopen = async function (event) {
		console.log('WebSocket is open now.');
	};

	ws.onmessage = async function (event) {
		console.log('Received message:', event.data);
	};

	ws.onclose = async function (event) {
		console.log('WebSocket is closed now.');
		// Try to reconnect in 5 seconds
		setTimeout(async function () {
			console.log('Attempting to reconnect...');
			connectWebSocket();
		}, RECONNECT_DELAY);
	};

	ws.onerror = async function (event) {
		console.error('WebSocket error observed:', event);
		// Try to reconnect in 5 seconds
		setTimeout(async function () {
			console.log('Attempting to reconnect...');
			connectWebSocket();
		}, RECONNECT_DELAY);
	};
}
