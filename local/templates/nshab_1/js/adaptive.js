(function() {
    var resolutions = [1900, 1280, 1024, 640, 320];
    var ratios = [1, 2];

    var clientWidth = Math.max(screen.width, screen.height);
    var ratio = ('devicePixelRatio' in window) ?
                parseInt(devicePixelRatio, 10) :
                1;

    ratio = ratios.indexOf(ratio) >= 0 ? ratio : ratios[0];

    clientWidth = clientWidth * ratio;

    var resolution = resolutions[0];
    if (clientWidth >= resolution) {
        resolution = resolution * ratio;
    } else {
        for (var i in resolutions) {
            if (clientWidth <= resolutions[i]) {
                resolution = resolutions[i];
            } else {
                break;
            }
        }
    }

    document.cookie = 'resolution=' + resolution + '; path=/';
})();
