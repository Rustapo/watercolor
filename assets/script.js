(() => {
	// Let's keep this shit scoped.

	// check_webp_feature:
	//   'feature' can be one of 'lossy', 'lossless', 'alpha' or 'animation'.
	//   'callback(feature, isSupported)' will be passed back the detection result (in an asynchronous way!)
	function check_webp_feature(feature, callback) {
	    var kTestImages = {
	        lossy: "UklGRiIAAABXRUJQVlA4IBYAAAAwAQCdASoBAAEADsD+JaQAA3AAAAAA",
	        lossless: "UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==",
	        alpha: "UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAARBxAR/Q9ERP8DAABWUDggGAAAABQBAJ0BKgEAAQAAAP4AAA3AAP7mtQAAAA==",
	        animation: "UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA"
	    };
	    var img = new Image();
	    img.onload = function () {
	        var result = (img.width > 0) && (img.height > 0);
	        callback(feature, result);
	    };
	    img.onerror = function () {
	        callback(feature, false);
	    };
	    img.src = "data:image/webp;base64," + kTestImages[feature];
	}

	const scrollhandle = e => {
		if(config.home !== config.page) return;

		document.querySelector("nav").style.opacity =
			document.documentElement.scrollTop > 100 ? 1 : 0

		document.querySelector(".icon-scroll").style.opacity =
			document.documentElement.scrollTop > 100 ? 0 : 1
	}

	const loadhandle = e => {
		if(config.home === config.page) {
			if(!localStorage.hasBeenBefore) {
				localStorage.hasBeenBefore = true

				window.scrollTo(0, 0)
				setTimeout(() => {
					document.body.style.overflow = "auto"
				}, 3500);
			} else {
				document.body.style.overflow = "auto"
			}
		} else {
			document.body.style.overflow = "auto"
			document.querySelector("nav").style.opacity = 1
		}

		check_webp_feature('lossy', (feature, isSupported) => isSupported
					? document.body.classList.add("webp")
					: document.body.classList.add("no-webp")
		)

		document.body.classList.remove("no-js")

	}

	addEventListener("scroll", scrollhandle)
	addEventListener("load", loadhandle)
})()
