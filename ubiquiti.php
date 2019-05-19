<?php
	$xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";      
	//***********************************************************************************************************************
	// V1.0 : Ubiquiti - UniFi Controller / copyright Influman 2019
	$action = getArg("action", true, ''); 
	$server = getArg("server", true); // VAR1
	$langage = getArg("lang", false, 'FR'); // VAR2
	$value = getArg("value", false);
	$ap_id = getArg("apid", false); // Actionneur AP
	$wlan_id = getArg("wlanid", false); // Actionneur WLAN
	$site_var3 = getArg("site", true); // VAR3
	$debug = getArg("debug", false);
	$periph_id = getArg('eedomus_controller_module_id'); 
	
	$tab_dpi_en = array(0 => "Instant Messaging", 1 => "P2P", 3 => "File Transfer", 4 => "Streaming Media", 5 => "Mail and Collaboration", 6 => "Voice over IP", 
					7 => "Database", 8 => "Games", 9 => "Network Management", 10 => "Remote Access Terminals", 11 => "Bypass Proxies and Tunnels", 12 => "Stock Market",
					13 => "Web", 14 => "Security Update", 15 => "Web IM", 17 => "Business", 18 => "Network Protocols", 19 => "Network Protocols", 20 => "Network Protocols",
					23 => "Private Protocol", 24 => "Social Network", 255 => "Unknown");
					
	$tab_dpi_fr = array(0 => "Messagerie Instantanée", 1 => "P2P", 3 => "Trasnfert de fichiers", 4 => "Média en streaming", 5 => "E-mail et collaboration", 6 => "Voix sur IP", 
					7 => "Base de données", 8 => "Jeux", 9 => "Gestion du réseau", 10 => "Terminaux d'accès distants", 11 => "Proxies, tunnels et autres bypass", 12 => "Marché actions",
					13 => "Web", 14 => "Mise à jour de sécurité", 15 => "Web IM", 17 => "Business", 18 => "Protocoles Réseau", 19 => "Protocoles Réseau", 20 => "Protocoles Réseau",
					23 => "Protocole privé", 24 => "Réseau social", 255 => "Inconnu");	
					
	$tab_devices = array("BZ2" => "UniFi AP", "BZ2LR" => "UniFi AP-LR", "U2HSR" => "UniFi AP-Outdoor+", "U2IW" => "UniFi AP-In Wall", "U2L48" => "UniFi AP-LR",
					"U2Lv2" => "UniFi AP-LR v2", "U2M" => "UniFi AP-Mini", "U2O" => "UniFi AP-Outdoor", "U2S48" => "UniFi AP", "U2Sv2" => "UniFi AP v2",
					"U5O" => "UniFi AP-Outdoor 5G", "U7E" => "UniFi AP-AC", "U7EDU" => "UniFi AP-AC-EDU", "U7Ev2" => "UniFi AP-AC v2", "U7HD" => "UniFi AP-HD",
					"U7SHD" => "UniFi AP-SHD", "U7NHD" => "UniFi AP-nanoHD", "UCXG" => "UniFi AP-XG", "UXSDM" => "UniFi AP-BaseStationXG", "UCMSH" => "UniFi AP-MeshXG",
					"U7IW" => "UniFi AP-AC-In Wall", "U7IWP" => "UniFi AP-AC-In Wall Pro", "U7MP" => "UniFi AP-AC-Mesh-Pro", "U7LR" => "UniFi AP-AC-LR", "U7LT" => "UniFi AP-AC-Lite",
					"U7O" => "UniFi AP-AC Outdoor", "U7P" => "UniFi AP-Pro", "U7MSH" => "UniFi AP-AC-Mesh", "U7PG2" => "UniFi AP-AC-Pro", "p2N" => "PicoStation M2",
					"US8" => "UniFi Switch 8", "US8P60" => "UniFi Switch 8 POE-60W", "US8P150" => "UniFi Switch 8 POE-150W", "S28150" => "UniFi Switch 8 AT-150W",
					"USC8" => "UniFi Switch 8", "US16P150" => "UniFi Switch 16 POE-150W", "S216150" => "UniFi Switch 16 AT-150W", "US24" => "UniFi Switch 24",
					"US24P250" => "UniFi Switch 24 POE-250W", "US24PL2" => "UniFi Switch 24 L2 POE", "US24P500" => "UniFi Switch 24 POE-500W", "S224250" =>	"UniFi Switch 24 AT-250W",
					"S224500" => "UniFi Switch 24 AT-500W", "US48" => "UniFi Switch 48", "US48P500" => "UniFi Switch 48 POE-500W", "US48PL2" => "UniFi Switch 48 L2 POE",
					"US48P750" => "UniFi Switch 48 POE-750W", "S248500" => "UniFi Switch 48 AT-500W", "S248750" => "UniFi Switch 48 AT-750W", "US6XG150" => "UniFi Switch 6XG POE-150W",
					"USXG" => "UniFi Switch 16XG", "UGW3" => "UniFi Security Gateway 3P", "UGW4" => "UniFi Security Gateway 4P", "UGWHD4" => "UniFi Security Gateway HD",
					"UGWXG" => "UniFi Security Gateway XG-8", "UP4" => "UniFi Phone-X", "UP5" => "UniFi Phone", "UP5t" => "UniFi Phone-Pro", "UP7" => "UniFi Phone-Executive",
					"UP5c" => "UniFi Phone", "UP5tc" => "UniFi Phone-Pro", "UP7c" => "UniFi Phone-Executive");		
					
	$tab_dict_fr = array("maj_available" => "Mise à jour disponible", "uptodate" => "A jour", "yes" => "Oui", "no" => "Non", "login_error" => "Erreur login UniFi", 
					"networkconf_error" => "Erreur accès aux données réseau du site", "site_not_found" => "Site UniFi non trouvé...", "sysinfo_error" => "Erreur accès aux données system du site",
					"nodevice" => "Appareil inexistant");
	
	$tab_dict_en = array("maj_available" => "Update available", "uptodate" => "Up to date", "yes" => "Yes", "no" => "No", "login_error" => "UniFi credentials error",
					"networkconf_error" => "Site network configuration access error", "site_not_found" => "UniFi site not found...", "sysinfo_error" => "Site system info access error",
					"nodevice" => "No device found");

	if ($action == '' ) {
		die();
	}
	$tab_dpi = $tab_dpi_fr;
	$tab_dict = $tab_dict_fr;
	if ($lang != "FR") {
		$tab_dpi = $tab_dpi_en;
		$tab_dict = $tab_dict_en;
	}
	
	$xml .= "<UNIFI>";
	$tab_param = explode(",",$server);
	$http = $tab_param[0];
	$server = $tab_param[1];
	$login = $tab_param[2];
	$pass = utf8_decode($tab_param[3]);
	$credentials = '{"username":"'.$login.'","password":"'.$pass.'"}';
	$headers = array('Content-Type: application/json');
	$info = array();
	$status = "";
	
	if ($action == "getstatus") { // Traitement principal obligatoire (lecture API UNIFI) - Périphérique Global Status
		// Login ////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		$url = $http."://".$server."/api/login";
		$response = httpQuery($url, 'POST', $credentials, NULL, $headers, true, false);
		$return_api = sdk_json_decode($response);
		$rc = $return_api['meta']['rc'];
		if ($rc != "ok") {
			$status = $tab_dict['login_error']." - ".$return_api['meta']['msg'];
			$xml .= "<STATUS>".$status."</STATUS>";
			$xml .= "</UNIFI>";
			sdk_header('text/xml');
			echo $xml;
			die();
		}
	
		// Configuration réseau /////////////////////////////////////
		/////////////////////////////////////////////////////////////
		$url = $http."://".$server."/api/s/".$site_var3."/rest/networkconf";
		$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);
		$return_api = sdk_json_decode($response);
		$rc = $return_api['meta']['rc'];
		if ($rc != "ok") {
			$status = $tab_dict['networkconf_error']." - ".$return_api['meta']['msg'];
			$xml .= "<STATUS>".$status."</STATUS>";
			$xml .= "</UNIFI>";
			sdk_header('text/xml');
			echo $xml;
			die();
		}
		$xmlnetworkconf = "<NETWORKCONF>";
		$i = 0;
		foreach($return_api['data'] as $networkconf) {
			$i++;
			$xmlnetworkconf .= "<ID".$i.">";
			$xmlnetworkconf .= "<SITE_ID>".$networkconf['site_id']."</SITE_ID>";
			$xmlnetworkconf .= "<NAME>".$networkconf['name']."</NAME>";
			if ($networkconf['purpose'] == "wan") {
				$xmlnetworkconf .= "<WAN_DNS1>".$networkconf['wan_dns1']."</WAN_DNS1>";
				$xmlnetworkconf .= "<WAN_DNS2>".$networkconf['wan_dns2']."</WAN_DNS2>";
				$xmlnetworkconf .= "<WAN_TYPE>".$networkconf['wan_type']."</WAN_TYPE>";
				$xmlnetworkconf .= "<WAN_IP>".$networkconf['wan_ip']."</WAN_IP>";
				$xmlnetworkconf .= "<WAN_GATEWAY>".$networkconf['wan_gateway']."</WAN_GATEWAY>";
				$xmlnetworkconf .= "<WAN_LOAD_BALANCE_TYPE>".$networkconf['wan_load_balance_type']."</WAN_LOAD_BALANCE_TYPE>";
			}
			$xmlnetworkconf .="</ID".$i.">";
		}
		$xmlnetworkconf .= "</NETWORKCONF>";
		saveVariable("UBIQUITI_NETWORKCONF_".$site_var3,$xmlnetworkconf);
	
		// System Info //////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		$url = $http."://".$server."/api/s/".$site_var3."/stat/sysinfo";
		$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);	
		$return_api = sdk_json_decode($response);
		$rc = $return_api['meta']['rc'];
		if ($rc != "ok") {
			$status = $tab_dict['sysinfo_error']." - ".$return_api['meta']['msg'];
			$xml .= "<STATUS>".$status."</STATUS>";
			$xml .= "</UNIFI>";
			sdk_header('text/xml');
			echo $xml;
			die();
		}
		
		foreach($return_api['data'] as $sysinfo) {
			$xmlsysinfo = "<SYSINFO>";
			$xmlsysinfo .= "<PCK_VERSION>".$sysinfo['package_version']."</PCK_VERSION>";
			$xmlsysinfo .= "<CLDK_VERSION>".$sysinfo['cloudkey_version']."</CLDK_VERSION>";
			if ($sysinfo['package_update_available'] == 1) {
				$xmlsysinfo .= "<PCK_UPDATE>".$tab_dict['maj_available']."</PCK_UPDATE>";
			} else {
				$xmlsysinfo .= "<PCK_UPDATE>".$tab_dict['uptodate']."</PCK_UPDATE>";
			}
			if ($sysinfo['cloudkey_update_available'] == 1) {
				$xmlsysinfo .= "<CLDK_UPDATE>".$tab_dict['maj_available']."</CLDK_UPDATE>";
			} else {
				$xmlsysinfo .= "<CLDK_UPDATE>".$tab_dict['uptodate']."</CLDK_UPDATE>";
			}
			$xmlsysinfo .= "</SYSINFO>";
		}
		saveVariable("UBIQUITI_SYSINFO_".$site_var3,$xmlsysinfo);
		
		// Liste des sites //////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		$url = $http."://".$server."/api/stat/sites";
		$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);
		$return_api = sdk_json_decode($response);
		$xmlsites = "<SITES>";
		$i = 0;
		foreach($return_api['data'] as $sites) {
			$i++;
			$site_name = $sites['name'];
			$xmlsite = "<ID".$i.">";
			$xmlsite .= "<SITE_ID>".$sites['_id']."</SITE_ID>";
			$xmlsite .= "<NAME>".$sites['name']."</NAME>";
			$xmlsite .= "<DESC>".$sites['desc']."</DESC>";
			$site_desc = $sites['desc'];
			$xmlsite .= "<NUM_NEW_ALARMS>".$sites['num_new_alarms']."</NUM_NEW_ALARMS>";
			// Santé du site ////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			$num_ap = 0;
			$num_gw = 0;
			$num_sw = 0;
			foreach($sites['health'] as $healths) {
				$subsystem = strtoupper($healths['subsystem']);
				$system_status = $healths['status'];
				// WLAN //////////////////////////////////////////////////////////////////
				if ($subsystem == "WLAN") {
					$status_wlan = $system_status;
					$xmlsite .= "<".$subsystem.">";
					if ($system_status == "unknown") {
						$num_ap = 0;
						$num_user_wlan = 0;
						$xmlsite .= "<SYS_STATUS>".$tab_dict['nodevice']."</SYS_STATUS>";
						$xmlsite .= "<NUM_USER>0</NUM_USER>";
						$xmlsite .= "<NUM_GUEST>0</NUM_GUEST>";
						$xmlsite .= "<NUM_IOT>0</NUM_IOT>";
						$xmlsite .= "<NUM_AP>0</NUM_AP>";
						$xmlsite .= "<NUM_ADOPTED>0</NUM_ADOPTED>";
						$xmlsite .= "<NUM_DISABLED>0</NUM_DISABLED>";
						$xmlsite .= "<TX>0</TX>";
						$xmlsite .= "<RX>0</RX>";
					} else {
						$num_ap = $healths['num_adopted'];
						$num_user_wlan = $healths['num_user'];
						$xmlsite .= "<SYS_STATUS>".$system_status."</SYS_STATUS>";
						$xmlsite .= "<NUM_USER>".$healths['num_user']."</NUM_USER>";
						$xmlsite .= "<NUM_GUEST>".$healths['num_guest']."</NUM_GUEST>";
						$xmlsite .= "<NUM_IOT>".$healths['num_iot']."</NUM_IOT>";
						$xmlsite .= "<NUM_AP>".$healths['num_ap']."</NUM_AP>";
						$xmlsite .= "<NUM_ADOPTED>".$num_ap."</NUM_ADOPTED>";
						$xmlsite .= "<NUM_DISABLED>".$healths['num_disabled']."</NUM_DISABLED>";
						$xmlsite .= "<TX>".$healths['tx_bytes-r']."</TX>";
						$xmlsite .= "<RX>".$healths['rx_bytes-r']."</RX>";
					}
					$xmlsite .= "</".$subsystem.">";
				// WAN //////////////////////////////////////////////////////////////////
				} else if ($subsystem == "WAN") {
					$status_gw = $system_status;
					$xmlsite .= "<".$subsystem.">";
					if ($system_status == "unknown") {
						$num_gw = 0;
						$xmlsite .= "<SYS_STATUS>".$tab_dict['nodevice']."</SYS_STATUS>";
						$xmlsite .= "<NUM_GW>0</NUM_GW>";
						$xmlsite .= "<NUM_ADOPTED>0</NUM_ADOPTED>";
						$xmlsite .= "<NUM_STA>0</NUM_STA>";
						$xmlsite .= "<GW_NAME>".$tab_dict['nodevice']."</GW_NAME>";
						$xmlsite .= "<CPU>0</CPU>";
						$xmlsite .= "<MEM>0</MEM>";
						$xmlsite .= "<TX>0</TX>";
						$xmlsite .= "<RX>0</RX>";
					} else {
						$num_gw = $healths['num_adopted'];
						$xmlsite .= "<SYS_STATUS>".$system_status."</SYS_STATUS>";
						$xmlsite .= "<NUM_GW>".$healths['num_gw']."</NUM_GW>";
						$xmlsite .= "<NUM_ADOPTED>".$healths['num_adopted']."</NUM_ADOPTED>";
						$xmlsite .= "<NUM_STA>".$healths['num_sta']."</NUM_STA>";
						$xmlsite .= "<GW_NAME>".$healths['gw_name']."</GW_NAME>";
						$xmlsite .= "<CPU>".$healths['gw_system-stats']['cpu']."</CPU>";
						$xmlsite .= "<MEM>".$healths['gw_system-stats']['mem']."</MEM>";
						$xmlsite .= "<TX>".$healths['tx_bytes-r']."</TX>";
						$xmlsite .= "<RX>".$healths['rx_bytes-r']."</RX>";
					}
					$xmlsite .= "</".$subsystem.">";
				// WWW //////////////////////////////////////////////////////////////////
				} else if ($subsystem == "WWW") {
					$xmlsite .= "<".$subsystem.">";
					$status_www = $system_status;
					if ($system_status == "unknown") {
						$xmlsite .= "<SYS_STATUS>".$tab_dict['nodevice']."</SYS_STATUS>";
						$xmlsite .= "<LATENCY>0</LATENCY>";
						$xmlsite .= "<XPUT_UP>0</XPUT_UP>";
						$xmlsite .= "<XPUT_DOWN>0</XPUT_DOWN>";
						$xmlsite .= "<TX>0</TX>";
						$xmlsite .= "<RX>0</RX>";
					} else {
						$xmlsite .= "<SYS_STATUS>".$system_status."</SYS_STATUS>";
						$xmlsite .= "<LATENCY>".$healths['latency']."</LATENCY>";
						$xmlsite .= "<XPUT_UP>".$healths['xput_up']."</XPUT_UP>";
						$xmlsite .= "<XPUT_DOWN>".$healths['xput_down']."</XPUT_DOWN>";
						$xmlsite .= "<TX>".$healths['tx_bytes-r']."</TX>";
						$xmlsite .= "<RX>".$healths['rx_bytes-r']."</RX>";
					}
					$xmlsite .= "</".$subsystem.">";
				// LAN //////////////////////////////////////////////////////////////////
				} else if ($subsystem == "LAN") {
					$status_lan = $system_status;
					$xmlsite .= "<".$subsystem.">";	
					if ($system_status == "unknown") {
						$num_sw = 0;
						$num_user_lan = 0;
						$xmlsite .= "<SYS_STATUS>".$tab_dict['nodevice']."</SYS_STATUS>";
						$xmlsite .= "<LAN_IP>8.8.8.8</LAN_IP>";
						$xmlsite .= "<NUM_USER>0</NUM_USER>";
						$xmlsite .= "<NUM_GUEST>0</NUM_GUEST>";
						$xmlsite .= "<NUM_IOT>0</NUM_IOT>";
						$xmlsite .= "<NUM_SW>0</NUM_SW>";
						$xmlsite .= "<NUM_ADOPTED>0</NUM_ADOPTED>";
						$xmlsite .= "<TX>0</TX>";
						$xmlsite .= "<RX>0</RX>";
					} else {
						$num_sw = $healths['num_adopted'];
						$num_user_lan = $healths['num_user'];
						$xmlsite .= "<SYS_STATUS>".$system_status."</SYS_STATUS>";
						$xmlsite .= "<LAN_IP>".$healths['lan_ip']."</LAN_IP>";
						$xmlsite .= "<NUM_USER>".$healths['num_user']."</NUM_USER>";
						$xmlsite .= "<NUM_GUEST>".$healths['num_guest']."</NUM_GUEST>";
						$xmlsite .= "<NUM_IOT>".$healths['num_iot']."</NUM_IOT>";
						$xmlsite .= "<NUM_SW>".$healths['num_sw']."</NUM_SW>";
						$xmlsite .= "<NUM_ADOPTED>".$healths['num_adopted']."</NUM_ADOPTED>";
						$xmlsite .= "<TX>".$healths['tx_bytes-r']."</TX>";
						$xmlsite .= "<RX>".$healths['rx_bytes-r']."</RX>";
					}
					$xmlsite .= "</".$subsystem.">";
				} else if ($subsystem == "VPN") {
					$xmlsite .= "<".$subsystem.">";
					$xmlsite .= "<SYS_STATUS>".$system_status."</SYS_STATUS>";
					$xmlsite .= "</".$subsystem.">";
				}
			}
			// Liste des devices d'un site //////////////////////////////
			/////////////////////////////////////////////////////////////
			$url = $http."://".$server."/api/s/".$site_name."/stat/device";
			$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);
			$return_devices = sdk_json_decode($response);
			$xmlsite .= "<DEVICES>";
			$tab_ap = array();
			foreach($return_devices['data'] as $devices) {
				$xmlsite .= "<DEVICE>";
				$xmlsite .= "<ID>".$devices['_id']."</ID>";
				$xmlsite .= "<TYPE>".$devices['type']."</TYPE>"; // USW, UAP, UGW
				$xmlsite .= "<MODEL>".$devices['model']."</MODEL>";
				if (array_key_exists($devices['model'],$tab_devices)) {
					$xmlsite .= "<MODEL_NAME>".$tab_devices[$devices['model']]."</MODEL_NAME>";
				} else {
					$xmlsite .= "<MODEL_NAME>".$devices['model']."</MODEL_NAME>";
				}
				$xmlsite .= "<NAME>".$devices['name']."</NAME>";
				$xmlsite .= "<ADOPTED>".$devices['adopted']."</ADOPTED>";
				$xmlsite .= "<MAC>".$devices['mac']."</MAC>";
				$xmlsite .= "<VERSION>".$devices['version']."</VERSION>";
				$xmlsite .= "<NUM_STA>".$devices['num_sta']."</NUM_STA>";
				$xmlsite .= "<TX>".$devices['tx_bytes']."</TX>";
				$xmlsite .= "<RX>".$devices['rx_bytes']."</RX>";
				if ($devices['type'] == "uap") {
					$tab_ap[$devices['name']] = $devices['_id'];
				}
				if ($devices['type'] == "usw") {
					$xmlsite .= "<PORTS>";
					foreach($devices['port_table'] as $ports) {
						$xmlsite .= "<PORT>";
						$xmlsite .= "<PORT_IDX>".$ports['port_idx']."</PORT_IDX>";
						$xmlsite .= "<PORT_NAME>".$ports['name']."</PORT_NAME>";
						$xmlsite .= "</PORT>";
					}
					$xmlsite .= "</PORTS>";
				}
				$xmlsite .= "</DEVICE>";
			}
			$xmlsite .= "</DEVICES>";
	
			// WLANCONF /////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			$url = $http."://".$server."/api/s/".$site_name."/rest/wlanconf";
			$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);
			$return_wlanconf = sdk_json_decode($response);
			$xmlsite .= "<WLANCONF>";
			$tab_wlan = array();
			foreach($return_wlanconf['data'] as $wlanconf) {
				$xmlsite .= "<WLAN>";
				$xmlsite .= "<ID>".$wlanconf['_id']."</ID>";
				$xmlsite .= "<NAME>".$wlanconf['name']."</NAME>";
				$xmlsite .= "<ENABLED>".$wlanconf['enabled']."</ENABLED>";
				$xmlsite .= "</WLAN>";
				$tab_wlan[$wlanconf['name']] = $wlanconf['_id'];
			}
			$xmlsite .= "</WLANCONF>";
			
			//// FIN LECTURE DU SITE ////////////////////////////////////
			/////////////////////////////////////////////////////////////
			$xmlsite .="</ID".$i.">";
			$xmlsites .= $xmlsite;
			if ($site_var3 == $site_name) {
				$status = $site_desc.": ";
				if ($num_gw > 0) {
					$status .= "www (".$status_www.") | ".$num_gw." gw (".$status_gw.") | ";
				}
				if ($num_sw > 0) {
					$status .= $num_sw." sw (".$num_user_lan.") | ";
				}
				if ($num_ap > 0) {
					$status .= $num_ap." ap (".$num_user_wlan.")";
				}
			}
			saveVariable("UBIQUITI_SITE_".$site_name, $xmlsite);
			saveVariable("UBIQUITI_SITE_ID_".$site_name, $i);
			saveVariable("UBIQUITI_WLAN_".$site_name, $tab_wlan);
			saveVariable("UBIQUITI_AP_".$site_name, $tab_ap);
		}
		$xmlsites .= "</SITES>";
		saveVariable("UBIQUITI_SITES", $xmlsites);
	
		// Etude résultat requêtes
		
		if ($debug == "1") {
			
			$url = $http."://".$server."/api/s/".$site_var3."/stat/sta";
			$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);	
			$xml .= " sta ".$response;
			
		}
		// Logout ///////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		$url = $http."://".$server."/api/logout";
		$response = httpQuery($url, 'GET', NULL, NULL, NULL, true);
		if ($status == "") {
			$status = $tab_dict['site_not_found'].$site_var3;
		}
		$xml .= $xmlsysinfo.$xmlnetworkconf.$xmlsites."<STATUS>".$status."</STATUS>";
	} // getstatus
	
	// ENABLE/DISABLE WLAN //////////////////////////////////////
	/////////////////////////////////////////////////////////////
	if ($action == "wlan" && $site_var3 != "") {
		if ($value == "disable") {
			$json = '{"enabled":false}';
		} else {
			$json = '{"enabled":true}';
		}
		$postfields = "json=".$json;
		if ($wlan_id == "all" || $wlan_id == "") {
			$loadsite = loadVariable("UBIQUITI_WLAN_".$site_var3);
			foreach($loadsite as $wlan_ids) {
				$url = $http."://".$server."/api/s/".$site_var3."/rest/wlanconf/".$wlan_ids;
				$response = httpQuery($url, 'PUT', $postfields, NULL, $headers, true);
			}
		} else {
			$url = $http."://".$server."/api/s/".$site_var3."/rest/wlanconf/".trim($wlan_id);
			$response = httpQuery($url, 'PUT', $postfields, NULL, $headers, true);
		}
		die();
	}
	
	// ENABLE/DISABLE AP ////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	if ($action == "ap" && $site_var3 != "") {
		if ($value == "disable") {
			$json = '{"disabled":true}';
		} else {
			$json = '{"disabled":false}';
		}
		$postfields = "json=".$json;
		if ($ap_id == "all" || $ap_id == "") {
			$loadsite = loadVariable("UBIQUITI_AP_".$site_var3);
			foreach($loadsite as $ap_ids) {
				$url = $http."://".$server."/api/s/".$site_var3."/rest/device/".$ap_ids;
				$response = httpQuery($url, 'PUT', $postfields, NULL, $headers, true);
			}
		} else {
			$url = $http."://".$server."/api/s/".$site_var3."/rest/device/".trim($ap_id);
			$response = httpQuery($url, 'PUT', $postfields, NULL, $headers, true);
		}
		die();
	}
	
	// BLOCK/UNBLOCK CLIENT /////////////////////////////////////
	/////////////////////////////////////////////////////////////
	if ($action == "block" && $site_var3 != "" && $value != "") {
		$json = '{"cmd": "block-sta", "mac":"'.strtolower($value).'"}';
		$postfields = "json=".$json;
		$url = $http."://".$server."/api/s/".$site_var3."/cmd/stamgr";
		$response = httpQuery($url, 'POST', $postfields, NULL, $headers, true);
		die();
	}
	
	if ($action == "unblock" && $site_var3 != "" && $value != "") {
		$json = '{"cmd": "unblock-sta", "mac":"'.strtolower($value).'"}';
		$postfields = "json=".$json;
		$url = $http."://".$server."/api/s/".$site_var3."/cmd/stamgr";
		$response = httpQuery($url, 'POST', $postfields, NULL, $headers, true);
		die();
	}
	
	// POLLING DATA /////////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	if ($action = "polling" && $site_var3 != "") {
		$loadsysinfo = loadVariable("UBIQUITI_SYSINFO_".$site_var3);
		$loadnetworkconf = loadVariable("UBIQUITI_NETWORKCONF_".$site_var3);
		$loadsite = loadVariable("UBIQUITI_SITE_".$site_var3);
		$xml .= $loadsysinfo.$loadnetworkconf.substr($loadsite, 5, -6);
		
	}
	
	$xml .= "</UNIFI>";
	sdk_header('text/xml');
	echo $xml;                      
?>
