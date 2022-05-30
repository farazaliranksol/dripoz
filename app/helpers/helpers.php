<?php

use App\Models\CampaignHour;
use App\Models\ClientUserPermission;
use Illuminate\Support\Facades\Auth;

function userPermission($id){
    $userPermisssion =  ClientUserPermission::where('user_id', $id)->first();
    return $userPermisssion;
}

function getAreaCode()
{
    $options = '<option value="">Select</option><option value="201">201</option><option value="202">202</option><option value="203">203</option><option value="205">205</option><option value="206">206</option><option value="207">207</option><option value="208">208</option><option value="209">209</option><option value="210">210</option><option value="212">212</option><option value="213">213</option><option value="214">214</option><option value="215">215</option><option value="216">216</option><option value="217">217</option><option value="218">218</option><option value="219">219</option><option value="220">220</option><option value="223">223</option><option value="224">224</option><option value="225">225</option><option value="226">226</option><option value="228">228</option><option value="229">229</option><option value="231">231</option><option value="234">234</option><option value="236">236</option><option value="239">239</option><option value="240">240</option><option value="248">248</option><option value="249">249</option><option value="251">251</option><option value="252">252</option><option value="253">253</option><option value="254">254</option><option value="256">256</option><option value="260">260</option><option value="262">262</option><option value="267">267</option><option value="269">269</option><option value="270">270</option><option value="272">272</option><option value="276">276</option><option value="281">281</option><option value="289">289</option><option value="301">301</option><option value="302">302</option><option value="304">304</option><option value="305">305</option><option value="306">306</option><option value="307">307</option><option value="308">308</option><option value="309">309</option><option value="310">310</option><option value="312">312</option><option value="313">313</option><option value="314">314</option><option value="315">315</option><option value="316">316</option><option value="317">317</option><option value="318">318</option><option value="319">319</option><option value="320">320</option><option value="321">321</option><option value="323">323</option><option value="325">325</option><option value="330">330</option><option value="331">331</option><option value="332">332</option><option value="334">334</option><option value="336">336</option><option value="337">337</option><option value="339">339</option><option value="343">343</option><option value="346">346</option><option value="347">347</option><option value="351">351</option><option value="352">352</option><option value="360">360</option><option value="361">361</option><option value="364">364</option><option value="365">365</option><option value="380">380</option><option value="385">385</option><option value="386">386</option><option value="401">401</option><option value="402">402</option><option value="404">404</option><option value="405">405</option><option value="406">406</option><option value="407">407</option><option value="408">408</option><option value="409">409</option><option value="410">410</option><option value="412">412</option><option value="413">413</option><option value="414">414</option><option value="415">415</option><option value="417">417</option><option value="419">419</option><option value="423">423</option><option value="424">424</option><option value="425">425</option><option value="430">430</option><option value="431">431</option><option value="432">432</option><option value="434">434</option><option value="435">435</option><option value="437">437</option><option value="440">440</option><option value="442">442</option><option value="443">443</option><option value="445">445</option><option value="450">450</option><option value="458">458</option><option value="463">463</option><option value="469">469</option><option value="470">470</option><option value="475">475</option><option value="478">478</option><option value="479">479</option><option value="480">480</option><option value="484">484</option><option value="501">501</option><option value="502">502</option><option value="503">503</option><option value="504">504</option><option value="505">505</option><option value="506">506</option><option value="507">507</option><option value="508">508</option><option value="509">509</option><option value="510">510</option><option value="512">512</option><option value="513">513</option><option value="515">515</option><option value="516">516</option><option value="517">517</option><option value="518">518</option><option value="520">520</option><option value="530">530</option><option value="531">531</option><option value="534">534</option><option value="539">539</option><option value="540">540</option><option value="541">541</option><option value="548">548</option><option value="551">551</option><option value="559">559</option><option value="561">561</option><option value="562">562</option><option value="563">563</option><option value="564">564</option><option value="567">567</option><option value="570">570</option><option value="571">571</option><option value="573">573</option><option value="574">574</option><option value="575">575</option><option value="579">579</option><option value="580">580</option><option value="585">585</option><option value="586">586</option><option value="601">601</option><option value="602">602</option><option value="603">603</option><option value="604">604</option><option value="605">605</option><option value="606">606</option><option value="607">607</option><option value="608">608</option><option value="609">609</option><option value="610">610</option><option value="612">612</option><option value="613">613</option><option value="614">614</option><option value="615">615</option><option value="616">616</option><option value="617">617</option><option value="618">618</option><option value="619">619</option><option value="620">620</option><option value="623">623</option><option value="626">626</option><option value="628">628</option><option value="629">629</option><option value="630">630</option><option value="631">631</option><option value="636">636</option><option value="641">641</option><option value="646">646</option><option value="647">647</option><option value="650">650</option><option value="651">651</option><option value="657">657</option><option value="660">660</option><option value="661">661</option><option value="662">662</option><option value="667">667</option><option value="669">669</option><option value="678">678</option><option value="681">681</option><option value="682">682</option><option value="701">701</option><option value="702">702</option><option value="703">703</option><option value="704">704</option><option value="705">705</option><option value="706">706</option><option value="707">707</option><option value="708">708</option><option value="709">709</option><option value="712">712</option><option value="714">714</option><option value="715">715</option><option value="716">716</option><option value="717">717</option><option value="718">718</option><option value="719">719</option><option value="720">720</option><option value="724">724</option><option value="725">725</option><option value="726">726</option><option value="727">727</option><option value="731">731</option><option value="732">732</option><option value="734">734</option><option value="737">737</option><option value="740">740</option><option value="743">743</option><option value="747">747</option><option value="754">754</option><option value="757">757</option><option value="760">760</option><option value="762">762</option><option value="763">763</option><option value="765">765</option><option value="769">769</option><option value="770">770</option><option value="772">772</option><option value="773">773</option><option value="774">774</option><option value="775">775</option><option value="778">778</option><option value="779">779</option><option value="781">781</option><option value="782">782</option><option value="785">785</option><option value="786">786</option><option value="801">801</option><option value="802">802</option><option value="803">803</option><option value="804">804</option><option value="805">805</option><option value="806">806</option><option value="807">807</option><option value="808">808</option><option value="810">810</option><option value="812">812</option><option value="813">813</option><option value="814">814</option><option value="815">815</option><option value="816">816</option><option value="817">817</option><option value="818">818</option><option value="819">819</option><option value="825">825</option><option value="828">828</option><option value="830">830</option><option value="831">831</option><option value="832">832</option><option value="843">843</option><option value="845">845</option><option value="847">847</option><option value="848">848</option><option value="850">850</option><option value="854">854</option><option value="856">856</option><option value="857">857</option><option value="858">858</option><option value="859">859</option><option value="860">860</option><option value="862">862</option><option value="863">863</option><option value="864">864</option><option value="865">865</option><option value="867">867</option><option value="870">870</option><option value="872">872</option><option value="873">873</option><option value="878">878</option><option value="901">901</option><option value="902">902</option><option value="903">903</option><option value="904">904</option><option value="906">906</option><option value="908">908</option><option value="909">909</option><option value="910">910</option><option value="912">912</option><option value="913">913</option><option value="914">914</option><option value="915">915</option><option value="916">916</option><option value="917">917</option><option value="918">918</option><option value="919">919</option><option value="920">920</option><option value="925">925</option><option value="928">928</option><option value="929">929</option><option value="930">930</option><option value="931">931</option><option value="934">934</option><option value="936">936</option><option value="937">937</option><option value="938">938</option><option value="940">940</option><option value="941">941</option><option value="947">947</option><option value="949">949</option><option value="951">951</option><option value="952">952</option><option value="954">954</option><option value="956">956</option><option value="959">959</option><option value="970">970</option><option value="971">971</option><option value="972">972</option><option value="973">973</option><option value="978">978</option><option value="979">979</option><option value="980">980</option><option value="984">984</option><option value="985">985</option><option value="986">986</option><option value="989">989</option>';
    return $options;
}
function getTime()
{
    $time = array('10' => '10 Seconds', '20' => '20 Seconds', '30' => '30 Seconds', '45' => '45 Seconds', '60' => '60 Seconds', '90' => '90 Seconds', '120' => '2 Minutes', '180' => '3 Minutes', '240' => '4 Minutes', '300' => '5 Minutes');
    return $time;
}
function getTimeArray()
{
    $timeArray = array(strtotime('6:00') => '06:00 AM', strtotime('06:30') => '06:30 AM', strtotime('07:00') => '07:00 AM', strtotime('07:30') => '07:30 AM', strtotime('08:00') => '08:00 AM', strtotime('08:30') => '08:30 AM', strtotime('09:00') => '09:00 AM', strtotime('09:30') => '09:30 AM', strtotime('10:00') => '10:00 AM', strtotime('10:30') => '10:30 AM', strtotime('11:00') => '11:00 AM', strtotime('11:30') => '11:30 AM', strtotime('12:00') => '12:00 PM', strtotime('12:30') => '12:30 PM', strtotime('13:00') => '01:00 PM', strtotime('13:30') => '01:30 PM', strtotime('14:00') => '02:00 PM', strtotime('14:30') => '02:30 PM', strtotime('15:00') => '03:00 PM', strtotime('15:30') => '03:30 PM', strtotime('16:00') => '04:00 PM', strtotime('16:30') => '04:30 PM', strtotime('17:00') => '05:00 PM', strtotime('17:30') => '05:30 PM', strtotime('18:00') => '06:00 PM', strtotime('18:30') => '06:30 PM', strtotime('19:00') => '07:00 PM', strtotime('19:30') => '07:30 PM', strtotime('20:00') => '08:00 PM', strtotime('20:30') => '08:30 PM', strtotime('21:00') => '09:00 PM');
    return $timeArray;
}
function getStateArray()
{

    $us_state_abbrevs_names = array(
        'AL' => 'ALABAMA',
        'AK' => 'ALASKA',
        'AS' => 'AMERICAN SAMOA',
        'AZ' => 'ARIZONA',
        'AR' => 'ARKANSAS',
        'CA' => 'CALIFORNIA',
        'CO' => 'COLORADO',
        'CT' => 'CONNECTICUT',
        'DE' => 'DELAWARE',
        'DC' => 'DISTRICT OF COLUMBIA',
        'FM' => 'FEDERATED STATES OF MICRONESIA',
        'FL' => 'FLORIDA',
        'GA' => 'GEORGIA',
        'GU' => 'GUAM GU',
        'HI' => 'HAWAII',
        'ID' => 'IDAHO',
        'IL' => 'ILLINOIS',
        'IN' => 'INDIANA',
        'IA' => 'IOWA',
        'KS' => 'KANSAS',
        'KY' => 'KENTUCKY',
        'LA' => 'LOUISIANA',
        'ME' => 'MAINE',
        'MH' => 'MARSHALL ISLANDS',
        'MD' => 'MARYLAND',
        'MA' => 'MASSACHUSETTS',
        'MI' => 'MICHIGAN',
        'MN' => 'MINNESOTA',
        'MS' => 'MISSISSIPPI',
        'MO' => 'MISSOURI',
        'MT' => 'MONTANA',
        'NE' => 'NEBRASKA',
        'NV' => 'NEVADA',
        'NH' => 'NEW HAMPSHIRE',
        'NJ' => 'NEW JERSEY',
        'NM' => 'NEW MEXICO',
        'NY' => 'NEW YORK',
        'NC' => 'NORTH CAROLINA',
        'ND' => 'NORTH DAKOTA',
        'MP' => 'NORTHERN MARIANA ISLANDS',
        'OH' => 'OHIO',
        'OK' => 'OKLAHOMA',
        'OR' => 'OREGON',
        'PW' => 'PALAU',
        'PA' => 'PENNSYLVANIA',
        'PR' => 'PUERTO RICO',
        'RI' => 'RHODE ISLAND',
        'SC' => 'SOUTH CAROLINA',
        'SD' => 'SOUTH DAKOTA',
        'TN' => 'TENNESSEE',
        'TX' => 'TEXAS',
        'UT' => 'UTAH',
        'VT' => 'VERMONT',
        'VI' => 'VIRGIN ISLANDS',
        'VA' => 'VIRGINIA',
        'WA' => 'WASHINGTON',
        'WV' => 'WEST VIRGINIA',
        'WI' => 'WISCONSIN',
        'WY' => 'WYOMING',
        'AE' => 'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
        'AA' => 'ARMED FORCES AMERICA (EXCEPT CANADA)',
        'AP' => 'ARMED FORCES PACIFIC'
    );
    return $us_state_abbrevs_names;
}
function delCampaignHour($id,$day,$type){
 
        $check = CampaignHour::where(['campaign_id' => $id, 'day' => $day, 'type' => $type])->first();
        if ($check) {
            $del = CampaignHour::where(['campaign_id' => $id, 'day' => $day, 'type' => $type])->delete();
        }
}
function getEmojies()
    {
        return array(
            "&#9757;" => "&#9757;",
            "&#9977;" => "&#9977;",
            "&#9994;" => "&#9994;",
            "&#9995;" => "&#9995;",
            "&#9996;" => "&#9996;",
            "&#9997;" => "&#9997;",
            "&#127877;" => "&#127877;",
            "&#127938;" => "&#127938;",
            "&#127939;" => "&#127939;",
            "&#127940;" => "&#127940;",
            "&#127943;" => "&#127943;",
            "&#127946;" => "&#127946;",
            "&#127947;" => "&#127947;",
            "&#127948;" => "&#127948;",
            "&#128066;" => "&#128066;",
            "&#128067;" => "&#128067;",
            "&#128070;" => "&#128070;",
            "&#128071;" => "&#128071;",
            "&#128072;" => "&#128072;",
            "&#128073;" => "&#128073;",
            "&#128074;" => "&#128074;",
            "&#128075;" => "&#128075;",
            "&#128076;" => "&#128076;",
            "&#128077;" => "&#128077;",
            "&#128078;" => "&#128078;",
            "&#128079;" => "&#128079;",
            "&#128080;" => "&#128080;",
            "&#128102;" => "&#128102;",
            "&#128103;" => "&#128103;",
            "&#128104;" => "&#128104;",
            "&#128105;" => "&#128105;",
            "&#128110;" => "&#128110;",
            "&#128112;" => "&#128112;",
            "&#128113;" => "&#128113;",
            "&#128114;" => "&#128114;",
            "&#128115;" => "&#128115;",
            "&#128116;" => "&#128116;",
            "&#128117;" => "&#128117;",
            "&#128118;" => "&#128118;",
            "&#128119;" => "&#128119;",
            "&#128120;" => "&#128120;",
            "&#128124;" => "&#128124;",
            "&#128129;" => "&#128129;",
            "&#128130;" => "&#128130;",
            "&#128131;" => "&#128131;",
            "&#128133;" => "&#128133;",
            "&#128134;" => "&#128134;",
            "&#128170;" => "&#128170;",
            "&#128400;" => "&#128400;",
            "&#128405;" => "&#128405;",
            "&#128406;" => "&#128406;",
            "&#129304;" => "&#129304;",
            "&#129305;" => "&#129305;",
            "&#129307;" => "&#129307;",
            "&#129308;" => "&#129308;",
            "&#129309;" => "&#129309;",
            "&#129311;" => "&#129311;"
        );
    }
