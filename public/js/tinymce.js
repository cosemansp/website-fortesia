// visual editor buttons
(function() {  
    tinymce.create('tinymce.plugins.quote', {  	 
        init : function(ed, url) { 
		
			//one fourth column
			ed.addButton('pp_one_fourth', {  
				title : 'One fourth column',  
                image : url+'/../images/one_fourth_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[one_fourth]' + ed.selection.getContent() + '[/one_fourth]');  
					ed.undoManager.add();             	
				}  
        	}); 		
		
			//one third column
			ed.addButton('pp_one_third', {  
				title : 'One third column',  
                image : url+'/../images/one_third_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[one_third]' + ed.selection.getContent() + '[/one_third]');  
					ed.undoManager.add();             	
				}  
        	}); 
			
			//one half column
			ed.addButton('pp_one_half', {  
				title : 'One half column',  
                image : url+'/../images/one_half_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[one_half]' + ed.selection.getContent() + '[/one_half]');
					ed.undoManager.add(); 					  
            	}  
        	});	
			
			//two thirds column
			ed.addButton('pp_two_thirds', {  
				title : 'Two thirds column',  
                image : url+'/../images/two_third_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[two_thirds]' + ed.selection.getContent() + '[/two_thirds]');  
					ed.undoManager.add();             	
				}  
        	}); 
			
			//three fourths column
			ed.addButton('pp_three_fourths', {  
				title : 'Three fourths column',  
                image : url+'/../images/three_fourths_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[three_fourths]' + ed.selection.getContent() + '[/three_fourths]');  
					ed.undoManager.add();             	
				}  
        	}); 			
						
			//one column
			ed.addButton('pp_one', {  
				title : 'One column',  
                image : url+'/../images/one_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[one]' + ed.selection.getContent() + '[/one]');
					ed.undoManager.add(); 
            	}  
        	});
			
		
			//clear
			ed.addButton('pp_clear', {  
				title : 'Clear floats',  
                image : url+'/../images/clear_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[clear]');  
					ed.undoManager.add(); 
				}  
        	}); 
			
			//separator
			ed.addButton('pp_separator', {  
				title : 'Add line separator',  
                image : url+'/../images/sep_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[separator]');  
					ed.undoManager.add(); 
				}  
        	}); 
			
			//button
			ed.addButton('pp_button', {  
				title : 'Add button',  
                image : url+'/../images/button_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[button link=""]' + ed.selection.getContent() + '[/button]');
					ed.undoManager.add(); 
            	}  
        	});	
			
			//button
			ed.addButton('pp_icon', {  
				title : 'Add icon',  
                image : url+'/../images/icon_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[icon name=""]');
					ed.undoManager.add(); 
            	}  
        	});		
			
					
			//flexslider
			ed.addButton('pp_flexslider', {  
				title : 'Add Flexslider',  
                image : url+'/../images/slider_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[flexslider category=""]');
					ed.undoManager.add(); 
            	}  
        	});	
			
			//authors
			ed.addButton('pp_authors', {  
				title : 'Add Authors',  
                image : url+'/../images/authors_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[authors category=""]');
					ed.undoManager.add(); 
            	}  
        	});	
			
			//portfolio
			ed.addButton('pp_portfolio', {  
				title : 'Add Portfolio',  
                image : url+'/../images/portfolio_btn.png',  
				onclick : function() {  
                    ed.selection.setContent('[portfolio category=""]');
					ed.undoManager.add(); 
            	}  
        	});										
														
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);
})();