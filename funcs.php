<?php

	function have_warning(array $post,string ...$keys) {
		foreach ($post as $k => $v){	
			if (in_array($k, $keys)){
				return true;
			};
		};
	};

?>