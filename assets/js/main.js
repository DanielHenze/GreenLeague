var Game = function(){};
Game.prototype = {
    User: null,
    Region: null,
    Server: false,
    Active: false,

    setUser: function(uName, uRegion){
    	this.User = uName;
    	this.Region = uRegion;
    	this.Server = this.checkServer;
    },

    /*checkServer: function(){
		var request = $.ajax({
		  	url: "r.php",
		  	method: "POST",
		  	data: 	{ 
		  				e : "ServerCheck",
		  				ServerRegion : this.Region,
		  				Magic : "_SERVER_STATUS_INFORMATIONS" 
		  			}
		});
		 
		// Should return Boolean
		request.done(function(bResponse) {
			// console.log("Erfolg" + bResponse);
			$("#ResponseServer").html(bResponse);
		});
		 
		request.fail(function(jqXHR, textStatus) {
		  	return false;
		});
    },*/

    checkActiveGame: function(bGame){
    	if(bGame){
    		this.Active = true;
    	}else{
    		this.Active = false;
    	}
    },

    getActiveGame: function(e){
    	if(!this.Active){
    		return "Kein aktives Spiel gefunden.";
    	}
    },

    returnUser: function(){
    	console.log(this.User);
    }

};

var Validation = function(){};

Validation.prototype = {
    validate: false,

    trimFormValues: function(e){
        if(e){
           $(e.val()).trim(); 
           return false;
        }
    }

};


var formValidation = new Validation();
var GameObj = new Game();
(function(){

});
