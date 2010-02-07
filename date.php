<?
echo date('Y-m-d',1234);
$sql = "select v.".FLD_VIDEOS_ID_PK.",v.".FLD_VIDEOS_CATEGORY_ID.",v.".FLD_VIDEOS_NAME.",v.".FLD_VIDEOS_THUMB_NAME.",
v.".FLD_VIDEOS_USER_ID.",v.".FLD__VIDEO_DISPLAY_NAME.",v.".FLD_VIDEOS_STATUS.",c.".FLD_CATEGORY_NAME.",
u.".FLD_USER_FNAME.",u.".FLD_USER_LNAME.",u.".FLD_USER_MNAME.",c.".FLD_CATEGORY_FOR.",
(unix_timestamp( CURRENT_TIMESTAMP ) - unix_timestamp( v.".FLD_VIDEOS_CREATED_DATE." ))/60 as total_rows from ".TBL_VIDEOS." as v
left join ".TBL_CATEGORY." as c on c.".FLD_CATEGORY_ID_PK." = v.".FLD_VIDEOS_CATEGORY_ID."
left join ".TBL_USER_TABLE." as u on u.".FLD_USER_ID_PK." = v.".FLD_VIDEOS_USER_ID."
where c.".FLD_CATEGORY_STATUS." = '1' and v.".FLD_VIDEOS_STATUS." = '1' AND u.".FLD_USER_FNAME." IS NOT NULL $searchFor
group by total_rows HAVING total_rows <=1800 order by total_rows DESC"; 
?>