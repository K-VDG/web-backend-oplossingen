<?php

	class HTMLbuilder{
		public function __construct($header, $body, $footer){

		}



		public function buildHeader($header){
			echo($header);
			
		}		

		public function buildBody($body){
			echo($body);
		}		

		public function buildFooter($footer){
			echo($footer);
		}

	}
?>