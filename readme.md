#### **_dailyreport base for holics ENT_**

Inventory management and daily record keeping system, built on PHP OOP and Js, DB used, `SQL`

- cloudflare for DDOS

#### **_INSTALL_**

- Head to the config file and fil in the database params
- Change `URLROOT` to your default url
- Go to the public folder, and change the `htaccess` if its on an online server, change it to `/public` otherwise use `/rootfolder/public`, replace **root folder** with the name of ur folder
- Change `root url` in `main.js file`
- `uploads moved to app folder` to avoid errors

### To do

- change htps in all js

- change htacces in public, adjust timezone when day comes

- all static js fetched thru jsdeliver,

- load sales in real time

- delete sale and expense record, if user leave spage without saving record

- change url root in `main.js & Loadlatestsold`

- change jquery, bootstrap to cdn, all resources in header must use fast cdn

- final commit shouldnt have images

- allow only one sale per day, only allow edits

- loss from expense

- massive bug in editing main report

- Handle responsiveness later on
