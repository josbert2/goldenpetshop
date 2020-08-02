(function($) {
	'use strict';
	
	var progressBar = {};
	mkdf.modules.progressBar = progressBar;
	
	progressBar.mkdfInitProgressBars = mkdfInitProgressBars;
	
	
	progressBar.mkdfOnDocumentReady = mkdfOnDocumentReady;
	
	$(document).ready(mkdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfInitProgressBars();
	}
	
	/*
	 **	Horizontal progress bars shortcode
	 */
	function mkdfInitProgressBars() {
		var progressBar = $('.mkdf-progress-bar');
		
		if (progressBar.length) {
			progressBar.each(function () {
				var thisBar = $(this),
					thisBarContent = thisBar.find('.mkdf-pb-content'),
					progressBar = thisBar.find('.mkdf-pb-percent'),
					percentage = thisBarContent.data('percentage'),
				    percentageHolder = thisBar.find('.mkdf-pb-percent-holder');
				
				thisBar.appear(function () {
					mkdfInitToCounterProgressBar(progressBar, percentage, percentageHolder);
					
					thisBarContent.css('width', '0%').animate({'width': percentage + '%'}, 2000);
					
					if (thisBar.hasClass('mkdf-pb-percent-floating')) {
                        percentageHolder.css({'left':'0%', 'right':'auto'}).animate({'left': percentage + '%'}, 2000);
					}
				});
			});
		}
	}
	
	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function mkdfInitToCounterProgressBar(progressBar, percentageValue, percentageHolder){
		var percentage = parseFloat(percentageValue);
		
		if(percentageHolder.length) {
            percentageHolder.each(function() {
				var thisPercentHolder = $(this),
                    thisPercent = thisPercentHolder.find('.mkdf-pb-percent');
                thisPercentHolder.css('opacity', '1');
				thisPercent.css('opacity', '1');
				
				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});
			});
		}
	}
	
})(jQuery);