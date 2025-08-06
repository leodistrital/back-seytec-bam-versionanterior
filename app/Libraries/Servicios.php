<?php

namespace App\Libraries;

class Servicios
{
    public function __construct()
    {
        // Aquí puedes realizar cualquier inicialización necesaria para tu servicio
    }

    public function googleCapcha($capcha)
    {

       $url = 'https://www.google.com/recaptcha/api/siteverify';
		$keysecret = '6Ld8zdclAAAAAGdsNq6R1-fXuB4ysq0LVa4gIwkR';
		print_r($capcha);
		// $request = file_get_contents($url . '?secret=' . $keysecret . '&response=' . $capcha);
		$request = file_get_contents($url . '?secret=' . $keysecret . '&response=' . $capcha); 
		$response = json_decode($request);
            var_dump($response);
       
        exit;

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $keysecret = '6Ld8zdclAAAAAGdsNq6R1-fXuB4ysq0LVa4gIwkR';
        // $request = file_get_contents($url . '?secret=' . $keysecret . '&response=' . $capcha);
        $request = file_get_contents($url . '?secret=' . $keysecret . '&response=' . '03AL8dmw-GnmEw5B0m4XOenrIR77tbojoNrLZ2CkJiB3YjSollg1sYQx_NP6zkOID-H2_1nL-N11TXco2cNDrvTnTQlPtAyD1Xv1_6cjTovG-Oqf7FXK0wR72COPt5NEPkbKSDsWphpgCzUWZYIqglDvJpWz7LG2gwRsE3lUOAwKIPjZ0MK2FjjLHPKdWi2Pi7qzuOWBmJ2jN_lxZrdweEiERJ1nWVaMkSOe68WE__NnWpFP3L35ghl0reW2YmwEAZw9p_Ykta9Ta8mb-jQ2RPDMgaHPoZRX6evwyTTrd0prjdWyoBQk80VN3HGlVz0-eczQdkeILpSWxg5E5-_E46ZCTHN2mgKcyPfS9PXZ2_Gpcdsb7phT5rVs1v8j8KXkB6YH6I3c2DmYiRTOEivy3esLR1W0M7PHXIvwgFuvh8mwmSvSbP_mhMiqrWt4MlqNDGH6seROKloPHlPER_S3yS6CgC5YAmwSrSGknDrfrKC253qTdS7YA9zlo0kJSruvjRAKh8i4RqRXsX2bpJNryZ5eIyQmVhRIWdG3Uk9krA2O7hSQAIcUUuzMwKG5M7YIj-UI5XdkHOif_tx4PDdb2kSsD074af8lc2EpKjo_Ds0et6T3oUFK-UdwputnkECxm70kCNfrmvHfk_GMYE288aWRGEZWf0Ikg_1ciBal7lV4aBmLFWOG0O4vWWSc9a_f6FinmTQum2cJidqQZK1w72AllNW6JVXbnvHr_lmM97wxV6I-PIncOoxaOjgvLYmvZt158r2ODsAiwVLhn9oY18RSJ_xuj3V-FYXZHGHTFmMqdjUelxrVn8DOfL07lApfmIsRDQaMKyDW-RWuZ6qO9q1-hJTLu7A2LKdfRDiJyzQoVpXltAPqMpTRSMtHEt25LiqwyzSz0dMYhRg-rnaUrBKSLknU1ICMGpWAxSG_MgLXf98AaHX2wZ2cU0I2T2mzLmy2bwe9e44zrCtITDP5TFjWkObzxV2ZkTZXJt4EhkLmOOpK5vgIzESSqlVuBMTWv6r_bP7bkTBbJ5-1skwBakcz2We-2oAAa10Y-ag27vSy4NQLe4LRd8H-DwpxfWu8cN9wsrxcFaI3mUWSA9VGaej2TebCR--z2oWNvHDePo3Zdwt_i0CKmvh1JRw8EP7SSNU2-1FElJ1MaM2tYcx9X9As6BFwPsuG8vyq-iJ35WMurE-nZdb_aBxPKmt2DC32cC_nfZ292zsjj1LKXR7rN3WykzzhlUE3ghgSCbH_O6oty7ivUp_vMzTaugxGR_B7fMO7fs5QLi5hHYbOyv9IOVwx98__cTNeOYOMNwz492PW74R7fxYhGxAvyRXTtaBstDA7lLCDaKMJZl4S8cnJUkhzcF5lWLiF2eISHEz3wibGbBYW63Pcnk8HxWwG-kRJwyLKh5w-pyiHgfHxvRODiiQ3iv3Td5cHxC4DKZI0jUZglWKFBZ8k9Vpj8q-Bd6oUvSToK2lGa7SRosEaVR6hJgizm2VtORsuwvyX4R2_eMEExXPL-IwMS6MB91AQskTGk13JlKOGGZ_S8geCV3H1gr-Y07Qu5gLNoSng');
        $response = json_decode($request);
        var_dump($response);
        if ($response->success == true  && $response->score > 0.6) {
            return true;
        }
        return false;
    }

    /*

    */
}