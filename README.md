# silverstripe-content-blocks
A simple module for inserting blocks into page content

## instalation

to install module add the extensions to config.yml and dev/build?flush=1

```
Page:
  extensions:
    - BlocksExtension

Page_Controller:
  extensions:
    - Page_ControllerExtension

blocks can then be inserted into content using [block-$ID]
