var express = require("express");
var router = express.Router();

/* GET users listing. IP:3000/users */
router.get("/", function (req, res, next) {
  //res.send("respond with a resource");
  const users = [
    { name: "Shyam", email: "shyamjaiswal@gmail.com" },
    { name: "Bob", email: "bob32@gmail.com" },
    { name: "Jai", email: "jai87@gmail.com" },
  ];

  return res.status(200).json(users);
});

module.exports = router;
