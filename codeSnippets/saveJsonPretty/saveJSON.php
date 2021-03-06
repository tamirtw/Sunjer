<?php

$json = '{"Beaches":{"Ashdod":{"name":"\u05d0\u05e9\u05d3\u05d5\u05d3","imsIcon":"rainsun.png","airTemp":17,"humidity":65,"windDirection":"\u05de\u05e2\u05e8\u05d1\u05d9 \u05e6\u05e4\u05d5\u05df \u05de\u05e2\u05e8\u05d1\u05d9","windSpeed":"15","waterTemp":18,"minHeight":54,"maxHeight":98,"waveDataUpdate":"13\/02\/2011 05:34:00","avgWavePeriod":4},"TLV_West":{"name":"\u05ea\u05dc-\u05d0\u05d1\u05d9\u05d1 \u05d4\u05de\u05e2\u05e8\u05d1\u05d9","imsIcon":"rainsun.png","airTemp":17,"humidity":65,"windDirection":"\u05de\u05e2\u05e8\u05d1\u05d9 \u05e6\u05e4\u05d5\u05df \u05de\u05e2\u05e8\u05d1\u05d9","windSpeed":"15","waterTemp":18,"minHeight":60,"maxHeight":120},"TLV_Hilton":{"name":"\u05ea\u05dc-\u05d0\u05d1\u05d9\u05d1 \u05d4\u05d9\u05dc\u05d8\u05d5\u05df","imsIcon":"rainsun.png","airTemp":17,"humidity":65,"windDirection":"\u05de\u05e2\u05e8\u05d1\u05d9 \u05e6\u05e4\u05d5\u05df \u05de\u05e2\u05e8\u05d1\u05d9","windSpeed":"15","waterTemp":18,"minHeight":60,"maxHeight":120},"Haifa_BatGalim":{"name":"\u05d7\u05d9\u05e4\u05d4 \u05d1\u05ea-\u05d2\u05dc\u05d9\u05dd","imsIcon":"rainsun.png","airTemp":18,"humidity":65,"windDirection":"\u05d3\u05e8\u05d5\u05dd \u05de\u05e2\u05e8\u05d1\u05d9 \u05de\u05e2\u05e8\u05d1\u05d9","windSpeed":"15","waterTemp":18,"minHeight":60,"maxHeight":110,"waveDataUpdate":"13\/02\/2011 04:17:00","avgWavePeriod":4}},"updatedTo":"13\/02\/2011 07:40:04"}';

saveToFile(json_encode_pretty($json), "data2.json");

function saveToFile($content, $path) {
    $fp = fopen($path, 'w+') or die("I could not open $path.");
    fwrite($fp, $content);
    fclose($fp);
}

function json_encode_pretty($jsonString) {
    $tab = "  ";
    $new_json = "";
    $indent_level = 0;
    $in_string = false;

    // Check if JSON is valid
    $json_obj = json_decode($jsonString);
    if ($json_obj === false || $json_obj === NULL)
        throw new Exception ("Invalid JSON");

    $json = json_encode($json_obj);

    for ($c = 0; $c < strlen($json); $c++) {
        $char = $json[$c];
        switch ($char) {
            case '{':
            case '[':
                if (!$in_string) 
                    $new_json .= $char . "\n" . str_repeat($tab, $indent_level++ + 1);
                 else 
                    $new_json .= $char;
                
                break;
            case '}':
            case ']':
                if (!$in_string) 
                    $new_json .= "\n" . str_repeat($tab, --$indent_level) . $char;
                 else 
                    $new_json .= $char;
                
                break;
            case ',':
                if (!$in_string) 
                    $new_json .= ",\n" . str_repeat($tab, $indent_level);
                 else 
                    $new_json .= $char;
                break;
            case ':':
                if (!$in_string) 
                    $new_json .= ": ";
                 else 
                    $new_json .= $char;
                break;
            case '"':
                if ($c > 0 && $json[$c - 1] != '\\') 
                    $in_string = !$in_string;
            default:
                $new_json .= $char;
                break;
        }
    }

    return $new_json;
}

?>