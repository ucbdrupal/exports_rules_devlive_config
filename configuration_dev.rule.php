{ "rules_configuration_dev" : {
    "LABEL" : "Configuration: Dev",
    "PLUGIN" : "reaction rule",
    "TAGS" : [ "pantheon" ],
    "REQUIRES" : [ "rules", "php" ],
    "ON" : [ "cron" ],
    "IF" : [
      { "OR" : [
          { "text_matches" : {
              "text" : [ "site:url" ],
              "match" : "http[s]{0,1}\\:\/\/[devest]+\\.[^.]+\\.gotpantheon.com:{0,1}[\\d+]{0,}\/",
              "operation" : "regex"
            }
          },
          { "text_matches" : {
              "text" : [ "site:url" ],
              "match" : "http[s]{0,1}\\:\/\/[\\w\\.\\-_]*\\.localhost:{0,1}[\\d+]{0,}\/",
              "operation" : "regex"
            }
          }
        ]
      }
    ],
    "DO" : [
      { "php_eval" : { "code" : "variable_set('cas_server', 'auth-test.berkeley.edu');\r\n$casattrib = variable_get('cas_attributes', array());\r\n$casattrib['ldap']['server'] = 'ucb_test';\r\nvariable_set('cas_attributes', $casattrib);" } }
    ]
  }
}
