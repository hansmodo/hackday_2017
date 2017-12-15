#!/usr/bin/env php 
<?php
	$filename = $_ENV['TM_FILENAME'];

	$current_letter_number = 0;
	$document = file_get_contents('php://stdin');
	
	$letter_start_number = intval(get_letter_start_number());
	echo preg_replace_callback("/--BEGIN_LETTER--/","write_letter_markers",$document);

	function get_letter_start_number(){
		global $document;
		$pattern = "/--LETTER-START-NUMBER--\d{4}/";	
		preg_match($pattern, $document, $matches);
		preg_match("/\d{4}/",$matches[0],$matches);
		return $matches[0];
	}
	
	function write_letter_markers($matches){
	  global $letter_start_number;
	  global $current_letter_number;
	  $ret_val = $letter_start_number + $current_letter_number;
	  $current_letter_number++;
	  return $ret_val;
	}
	
	

?>


	#!/usr/bin/env php 
		<?php
			$filename = $_ENV['TM_FILENAME'];
			$document = file_get_contents('php://stdin');

			$city_names = array('/Akron/', '/Albany/', '/Alexandria/', '/Annapolis/', '/Arlington/', '/Atlanta/', '/Augusta/', '/Baltimore/', '/Baton Rouge/', '/Boston/', '/Braintree/', '/Cambridge/', '/Charleston/', '/Charlottesville/', '/Cincinnati/', '/Cleveland/', '/Columbus/', '/Concord/', '/Elizabethtown/', '/Fayetteville/', '/Fishkill/', '/Frankfort/', '/Fredericksburg/', '/Georgetown/', '/Hartford/', '/Lexington/', '/Litchfield/', '/Louisville/', '/Memphis/', '/Monticello/', '/Montpelier/', '/Mount Vernon/', '/Nashville/', '/New Orleans/', '/New York/', '/Newburyport/', '/Oxford/', '/Peekskill/', '/Philadelphia/', '/Pittsburgh/', '/Plymouth/', '/Poughkeepsie/', '/Princeton/', '/Providence/', '/Quincy/', '/Richmond/', '/Sacramento City/', '/Saratoga/', '/Savannah/', '/Syracuse/', '/Trenton/', '/Troy/', '/Utica/', '/Valley Forge/', '/Vicksburg/', '/Washington/', '/Watertown/', '/West Point/', '/Williamsburg/', '/York Town/','/Middlebrook/');
			echo preg_replace_callback($city_names,"linkify_city",$document);

			//the preg replace callback 
			function linkify_city($matches){
			  $ret_val = "<a href='/results.php?city=" . strtolower($matches[0]) . "' rel='city'>" . ucwords($matches[0]) . "</a>"; 
			  return $ret_val;
			}

		?>
			

			#!/usr/bin/env php 
			<?php
				$filename = $_ENV['TM_FILENAME'];
				$document = file_get_contents('php://stdin');

				$fragment_prefix = array('/ene \n/','/ap \n/','/com \n/','/Jer \n/','/appre \n/','/hav \n/','/commis \n/','/cer \n/','/de \n/','/dis \n/','/ope \n/','/Montgo \n/','/ar \n/','/ammu \n/','/un \n/','/Bos \n/','/cor \n/','/coun \n/','/advo \n/','/ap \n/','/congratu \n/','/ser \n/','/Conti \n/','/Legisla \n/','/quar \n/','/consti \n/','/incli \n/','/Mon \n/','/pos \n/','/peo \n/','/communi \n/','/ur \n/','/aban \n/','/opi \n/','/situa \n/','/trans \n/','/arri \n/','/pre \n/','/im \n/','/embar \n/','/incon \n/','/preju \n/','/calcu \n/','/notwith \n/','/mea \n/','/Gen \n/','/appro \n/','/judg \n/','/mi \n/','/addi \n/','/Wil \n/','/Conven \n/','/ree \n/','/Bri \n/','/offi \n/','/ridi \n/','/sacri \n/','/seve \n/','/tre \n/','/diffi \n/','/intelli \n/','/oppor \n/','/includ \n/','/af \n/','/ne \n/','/colo \n/');
				echo preg_replace_callback($fragment_prefix,"rejoin_word_fragments",$document);

				//the preg replace callback 
				function rejoin_word_fragments($matches){
					$ret_val = $matches[0]; 
					//echo"found match : " . $matches[];
					$ret_val = substr($ret_val,0,-2);
					return $ret_val;
				}
				?>
				
					#!/usr/bin/env php 
					<?php
						$filename = $_ENV['TM_FILENAME'];
						$document = file_get_contents('php://stdin');

						$fragment_suffix = array('/ \n /',);//save for testing


						/*
						$fragment_suffix = array('/ \nest /','/ \ningly /','/ \ning /','/ \ned /','/ \ntle /','/ \ncerely /','/ \ntions /','/ \ntion /','/ \nmery /','/ \ntillery /','/ \nnition /','/ \nsume /','/ \nther /','/ \nvolve /','/ \nsiderable /','/ \nite /','/ \ndency /','/ \nral /','/ \nlency /','/ \nings /','/ \nvited /','/ \nture /','/ \nnental /','/ \nter /','/ \ntered /','/ \nvised /','/ \ntinental /','/ \nsibly /','/ \nstruction /','/ \nlin /','/ \nsive /','/ \nprehensive /','/ \nhensive /','/ \nstant /','/ \nple /','/ \nceived /','/ \nlect /','/ \nveyed /','/ \nsor /','/ \nsumption /','/ \nga /','/ \nrassed /','/ \nportance /','/ \nveniences /','/ \ntrary /','/ \nbation /','/ \nment /','/ \nswered /','/ \ndition /','/ \nlected /','/ \npected /','/ \neral /','/ \nsary /','/ \nquence /','/ \ntution /','/ \ngomery /','/ \nlitia /','/ \nvenient /','/ \nually /','/ \nern /','/ \nfiscated /','/ \nterday /','/ \ntainty /','/ \nsistance /','/ \nnished /','/ \njected /','/ \nmon /','/ \ncers /','/ \nquired /','/ \nsoners /','/ \nculous /','/ \ntance /','/ \nficing /','/ \nmendous /','/ \nous /','/ \nculties /','/ \nrassments /','/ \nments /','/ \nment /','/ \ncellency /','/ \ntermined /','/ \ntermine /','/ \nrison /','/ \ngence /','/ \ngards /','/ \nlarly /','/ \nmentably /','/ \ntunity /','/ \nfect /','/ \nation /','/ \ngether /','/ \ntish /','/ \nnel /','/ \nder /','/ \ncluded /','/ \ntia /','/ \ncember /','/ \nquainted /','/ \nly /','/ \ntinied /','/ \nately /','/ \ncient /','/ \ntention /','/ \nnagement /','/ \ncide /','/ \nver /','/ \nnam /','/ \ntive /','/ \nvernor /','/ \nceed /','/ \nberately /','/ \nfident /','/ \ncuse /','/ \ncuse /','/ \ntinued /','/ \nphans /','/ \nriety /','/ \ntude /','/ \ndom /','/ \nspect, /','/ \ner /','/ \ners /','/ \nsion /','/ \nness /','/ \nverned /','/ \ntween /','/ \nspondent /','/ \nneas /','/ \nvor /','/ \ntached /','/ \ndient /','/ \nmise /','/ \ndezvous /','/ \nsisted /','/ \ners, /','/ \nbuted /','/ \nclination /','/ \necutive /','/ \nbly, /','/ \ncruiting /','/ \ncessfully /','/ \ntinent, /','/ \nspecting /','/ \ntity /','/ \nvided /','/ \nbers /','/ \nber /','/ \ndiers /','/ \npearances /','/ \nsetts, /','/ \nlar /','/ \nneral /','/ \ndiately /','/ \ncess /','/ \nportunity /','/ \nfer /','/ \nceiving /','/ \ncoln /','/ \nant /','/ \ndelphia /','/ \nrous /','/ \nmainder /','/ \nceeded /','/ \npect /','/ \nsels, /','/ \nderations, /','/ \nder, /','/ \nsachusetts /','/ \ntember, /','/ \ncation, /','/ \nverance /','/ \ntues, /','/ \nduced, /','/ \nive /','/ \nject /','/ \ncipally /','/ \npedition, /','/ \nquer /','/ \nger. /','/ \ntage /','/ \nquent /','/ \ncumstances /','/ \nfensive /','/ \nlorable /','/ \nvey /','/ \n /','/ \nfeit /','/ \ntary /','/ \nciples /','/ \npretence /','/ \nnesses /','/ \ngress /','/ \nience, /','/ \nguished, /','/ \nance /','/ \ngress /','/ \nledging /','/ \nperience /','/ \ntually /','/ \nbably /','/ \ncouragement /','/ \ntention, /','/ \nvorite /','/ \ncially /','/ \nities /','/ \nsioners, /','/ \nble /','/ \ncle, /','/ \nity /','/ \nning, /','/ \nthority /','/ \nvate /','/ \nsioners /','/ \ncere /','/ \nished /','/ \nbly /','/ \nly, /','/ \ngining /','/ \nspect /','/ \nnagement, /','/ \nately. /','/ \ntinied, /','/ \ncember, /','/ \nquainting /','/ \nlish /','/ \npices /','/ \nsity /','/ \nzard /','/ \nces /','/ \nnately /','/ \nblish /','/ \ntal /','/ \nicy /','/ \nnesty /','/ \nsident /','/ \nduce /','/ \nardly /','/ \nceedings /','/ \nsuaded /','/ \nievel /','/ \nrily /','/ \ncurred /','/ \nishment /','/ \nfrage /','/ \nrused /','/ \nflecting /','/ \npressly /','/ \nlution /','/ \nsidious /','/ \nconcilable /','/ \nceivel /','/ \nlity /','/ \naded /','/ \njor /','/ \ntial /','/ \npaign /','/ \nderable /','/ \nance, /','/ \nmities /','/ \nviduals /','/ \ntaliation, /','/ \nduced /','/ \nlery, /','/ \nssively /','/ \ngons /','/ \ncumstance /','/ \nvered /','/ \ngencies /','/ \nges /','/ \ndians /','/ \nmit /','/ \nperty /','/ \nswer /','/ \nnada. /','/ \ntinue /',
						'/ \nratives /','/ \nphy /','/ \nverted /','/ \ntient /','/ \ntody, /','/ \npenses, /','/ \ncally /','/ \ntely, /','/ \nflects /','/ \njecture /','/ \ngineer /','/ \nrably /','/ \ntinent /','/ \nswer /','/ \nneers. /','/ \nity, /','/ \nspectable /','/ \ncurity /','/ \ndiate /','/ \nlature /','/ \ncinity. /','/ \nlators, /','/ \nance. /','/ \nily /','/ \nviction /','/ \nvention, /','/ \nishment, /','/ \nrections /','/ \nmity /','/ \nlistment, /','/ \nciencies, /','/ \npect, /','/ \nsitions /','/ \ncised, /','/ \nercised /','/ \nvided, /','/ \nnate /','/ \nvanced /','/ \nnada /','/ \nnicated /','/ \ntice /','/ \ntelligence /','/ \nsonal /','/ \ncuted, /','/ \ncy, /','/ \ndium. /','/ \nlation /','/ \ntilio /','/ \nly, /','/ \nguid, /','/ \nvernments /','/ \nence /','/ \nclined /','/ \nbility /','/ \ndeavour /','/ \nnesty. /','/ \nrative /','/ \ndeavoured /','/ \nbarrassments /','/ \ntain /','/ \nnesty; /','/ \ntained, /','/ \ntre /','/ \ndeavor /','/ \nvidence /','/ \ntating /','/ \nbably, /','/ \nlatures /','/ \nfeebling /','/ \nducing /','/ \nrible /','/ \nsiegers /','/ \npedite /','/ \nbourhood /','/ \nlem /','/ \nsachusetts /','/ \njourned; /','/ \nren, /','/ \nary, /','/ \npeating /','/ \nlel, /','/ \nrupted /','/ \ncuted. /','/ \nperly /','/ \nness. /','/ \ndor, /','/ \nspects, /','/ \nputation /','/ \ntaining /','/ \nfess, /','/ \nty, /','/ \ncies /','/ \ntem, /','/ \nduction /',
						'/ \nquaintance /','/ \nlonel /','/ \ntral, /','/ \ndore /','/ \nzines /','/ \nvestiture /','/ \nject. /','/ \npriety /','/ \nfered /','/ \ncept /','/ \nceipt /','/ \nspicuity /','/ \nfidence /','/ \nvages, /','/ \nchor /','/ \nleys /','/ \ndians. /','/ \nfascines /','/ \ncates. /','/ \nprehending /','/ \nmination /','/ \npable /','/ \nans /','/ \nsylvania /','/ \nsisting /','/ \nsistently /','/ \nsengers /','/ \nfluence /','/ \nincide /','/ \njesty /','/ \ndered /','/ \nquiring /','/ \nnia, /','/ \npenses /','/ \nnent, /','/ \nploded /','/ \ndelphia /','/ \nbles /','/ \nmedy /','/ \npenses /','/ \ncitude /','/ \nmissary /','/ \ncertaining /','/ \nenced /','/ \nfluence /','/ \ndiness /','/ \nrity /','/ \ntely /','/ \nets, /','/ \nlative /','/ \nginia, /','/ \nvouring /','/ \ncursion /','/ \nmensions /','/ \nssive /','/ \nsition /','/ \nvene /','/ \ngular /','/ \nligence, /','/ \nlough /','/ \ncipal /','/ \ngerous /','/ \ntiguous /','/ \nsals /','/ \nployed /');
						*/

						echo preg_replace_callback($fragment_suffix,"rejoin_word_fragments",$document);

						//the preg replace callback 
						function rejoin_word_fragments($matches){
							$ret_val = $matches[0]; 
							$ret_val = substr($ret_val,2);
							return $ret_val;
						}

					?>
//////////////////////////////////////////
						#!/usr/bin/env php 
						<?php
							$filename = $_ENV['TM_FILENAME'];

							$current_letter_number = 0;
							$document = file_get_contents('php://stdin');

							$document_type = get_document_type();
							$letters_tla = get_letter_tla();
							$letters = get_letter();
							write_letter_file($letters,$document_type);

							function get_letter(){
								global $document;
								$pattern = '/<letter id="\w{3}\d*">\n(.*\n)*?<\/letter>/';
								preg_match_all($pattern, $document, $matches);
								return $matches[0];
							}

							//Save each letter to a separate file using the id as part of file name
							function write_letter_file($letters,$document_type){
								//global $letters_tla;
								foreach($letters as $letter){
									$pattern = '/<letter id="\w{3}\d*">/';
									preg_match($pattern, $letter, $matches);
									//print_r($matches[0]);
									preg_match('/\=\"\w{3}\d{4}/',$matches[0],$matches);
									$doc_id = substr($matches[0],2);
									//echo"$doc_id";
									$file_name = "/Users/Ken/Desktop/Hans/Familytales/WIP/Workflow/" . $document_type . "_" . $doc_id . ".txt";
									$fileHandle = fopen($file_name, 'x') OR die ("Can't open file\n");

									$result = fwrite ($fileHandle, $letter);

									fclose($fileHandle);
								}
								return;
							}

							//Get the document type ie letter, journal, poem etc
							function get_document_type(){
								global $document;
								$pattern = "/--DOCUMENT-TYPE--\w{3}/";
								preg_match($pattern, $document, $matches);
								$type = substr($matches[0], -3);
								return $type;
							}

							//Get three letter acronym associated with letter file
							function get_letter_tla(){
								global $document;
								$pattern = "/--LETTER-TLA--\w{3}/";	
								preg_match($pattern, $document, $matches);
								$tla = substr($matches[0], -3);
								return $tla;
							}

						?>
////////////////////////////////////

#!/usr/bin/env php 
<?php
	$filename = $_ENV['TM_FILENAME'];

	$current_letter_number = 0;
	$document = file_get_contents('php://stdin');
	
	$letter_start_number = intval(get_letter_start_number());
	$letters_tla = get_letter_tla();

	echo preg_replace_callback("/<!--BEGIN_LETTER-->/","write_letter_markers",$document);

	function get_letter_start_number(){
		global $document;
		$pattern = "/--LETTER-START-NUMBER--\d{4}/";	
		preg_match($pattern, $document, $matches);
		preg_match("/\d{4}/",$matches[0],$matches);
		return $matches[0];
	}

	//Get three letter acronym associated with letter file
	function get_letter_tla(){
		global $document;
		$pattern = "/--LETTER-TLA--\w{3}/";	
		preg_match($pattern, $document, $matches);
		$tla = substr($matches[0], -3);
		return $tla;
	}
	
	function write_letter_markers($matches){
	  global $letter_start_number;
	  global $letters_tla;
	  global $current_letter_number;
	  $id_number = $letter_start_number + $current_letter_number;
	  $ret_val = '</letter><letter id="' . $letters_tla . $id_number . '">';
	  $current_letter_number++;
	  return $ret_val;
	}
	
	

?>