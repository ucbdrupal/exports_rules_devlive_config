{ "rules_configuration_live" : {
    "LABEL" : "Configuration: Live",
    "PLUGIN" : "reaction rule",
    "TAGS" : [ "pantheon" ],
    "REQUIRES" : [ "rules", "php" ],
    "ON" : [ "user_view" ],
    "IF" : [
      { "OR" : [
          { "text_matches" : {
              "text" : [ "site:url" ],
              "match" : "http[s]{0,1}\\:\/\/[\\w\\.\\-_]*\\.berkeley.edu:{0,1}[\\d+]{0,}\/",
              "operation" : "regex"
            }
          },
          { "text_matches" : {
              "text" : [ "site:url" ],
              "match" : "http[s]{0,1}\\:\/\/live\\.[^.]+\\.gotpantheon.com:{0,1}[\\d+]{0,}\/",
              "operation" : "regex"
            }
          }
        ]
      }
    ],
    "DO" : [
      { "php_eval" : { "code" : "variable_set('cas_server', 'auth.berkeley.edu');\r\n$casattrib = variable_get('cas_attributes', array());\r\n$casattrib['ldap']['server'] = 'ucb_prod';\r\nvariable_set('cas_attributes', $casattrib);" } }
    ]
  }
}
