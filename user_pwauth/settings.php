<?php

/**
 * ownCloud - user_pwauth
 *
 * @author Clément Véret
 * @copyright 2011 Clément Véret veretcle+owncloud@mateu.be
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$params = array('min_uid', 'max_uid');

if ($_POST) {
	foreach($params as $param){
		if(isset($_POST[$param])){
			OC_Appconfig::setValue('user_pwauth', $param, $_POST[$param]);
		}
	}
}

// fill template
$tmpl = new OC_Template( 'user_pwauth', 'settings');
$tmpl->assign( 'min_uid', OC_Appconfig::getValue('user_pwauth', 'min_uid', OC_USER_BACKEND_PWAUTH_MIN_UID));
$tmpl->assign( 'max_uid', OC_Appconfig::getValue('user_pwauth', 'max_uid', OC_USER_BACKEND_PWAUTH_MAX_UID));

return $tmpl->fetchPage();