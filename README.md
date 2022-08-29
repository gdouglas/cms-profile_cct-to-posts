# cms-profile_cct-to-posts
Convert the profiles_cct post type to standard posts for the UBC CMS service.

# Changes to process
Things to change in the xml 

1. the item category domain. Change
'profile_cct_position' to a tag
<category domain="profile_cct_position" nicename="emeriti">
    <![CDATA[Emeriti]]>
</category>

Change the post_type to
<wp:post_type> <![CDATA[profile_cct]]> </wp:post_type>
<wp:post_type> <![CDATA[post]]> </wp:post_type>


2. Remove all post meta related to profile_cct. It is for editing.
<wp:meta_key> <![CDATA[profile_cct]]> </wp:meta_key>
<wp:meta_value>
    <![CDATA[a:19:{s:4:"name";a:5:{s:11:"salutations";s:0:"";s:5:"first";s:6:"Lesley";s:6:"middle";s:0:"";s:4:"last";s:10:"Bainbridge";s:11:"credentials";s:0:"";}s:5:"phone";a:1:{i:0;a:5:{s:6:"option";s:0:"";s:5:"tel-1";s:3:"604";s:5:"tel-2";s:3:"822";s:5:"tel-3";s:4:"1712";s:9:"extension";s:0:"";}}s:8:"position";a:2:{i:0;a:3:{s:8:"position";s:0:"";s:12:"organization";s:0:"";s:3:"url";s:0:"";}i:1;a:3:{s:8:"position";s:78:"Associate
    Principal Interprofessional Education, College of Health
    Disciplines";s:12:"organization";s:0:"";s:3:"url";s:0:"";}}s:7:"address";a:8:{s:13:"building-name";s:0:"";s:11:"room-number";s:0:"";s:8:"street-1";s:0:"";s:8:"street-2";s:0:"";s:4:"city";s:0:"";s:8:"province";s:0:"";s:7:"country";s:0:"";s:6:"postal";s:0:"";}s:5:"email";a:1:{i:0;a:1:{s:5:"email";s:0:"";}}s:7:"website";a:1:{i:0;a:2:{s:7:"website";s:0:"";s:10:"site-title";s:0:"";}}s:6:"social";a:1:{i:0;a:2:{s:6:"option";s:0:"";s:8:"username";s:0:"";}}s:15:"graduatestudent";a:1:{i:0;a:6:{s:19:"student-salutations";s:0:"";s:13:"student-first";s:0:"";s:14:"student-middle";s:0:"";s:12:"student-last";s:0:"";s:19:"student-credentials";s:0:"";s:15:"student-website";s:0:"";}}s:16:"unitassociations";a:1:{i:0;a:2:{s:4:"unit";s:0:"";s:12:"unit-website";s:0:"";}}s:3:"bio";a:1:{s:8:"textarea";s:0:"";}s:14:"specialization";a:1:{i:0;a:1:{s:14:"specialization";s:0:"";}}s:9:"education";a:1:{i:0;a:4:{s:6:"school";s:0:"";s:4:"year";s:0:"";s:6:"degree";s:0:"";s:7:"honours";s:0:"";}}s:10:"department";a:1:{i:0;a:2:{s:10:"department";s:0:"";s:3:"url";s:0:"";}}s:17:"secondary_address";a:8:{s:13:"building-name";s:0:"";s:11:"room-number";s:0:"";s:8:"street-1";s:0:"";s:8:"street-2";s:0:"";s:4:"city";s:0:"";s:8:"province";s:0:"";s:7:"country";s:0:"";s:6:"postal";s:0:"";}s:18:"clone_general_text";a:1:{s:8:"textarea";s:0:"";}s:8:"teaching";a:1:{s:8:"textarea";s:0:"";}s:8:"research";a:1:{s:8:"textarea";s:0:"";}s:12:"publications";a:1:{s:8:"textarea";s:0:"";}s:20:"clone_academic_title";a:1:{i:0;a:1:{s:4:"text";s:0:"";}}}]]>
</wp:meta_value>

