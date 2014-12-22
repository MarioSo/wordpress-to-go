require.config({
	"appDir": "../scripts/",
	"removeCombined": true,
	"baseUrl": "./",
	"paths": {
			"requireLib": "basejs/vendor/require",
			"ready" : "basejs/vendor/domReady",
			"elements" : "basejs/modules/elements"
	},
	"dir": "../static/js",
	"optimize": "none",
	"modules": [{
			"name": "main",
			"include": ["requireLib"]
		}
	]
});
