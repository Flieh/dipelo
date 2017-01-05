  <form name="jump" action="" method="post">
    <p align="center">
      <select name="menu">

        <option value="ddCsvUpdate.php">1.Check for new Csv (modifies ddeloGameList.json)</option>
        <option value="ddGameSort.php">2.Sort Games by Finish Date and Game Number (modifies ddeloGameList.json)</option>
        <option value="ddValidateGames.php">3.Check Game List for Problems (no file modification)</option>
        <option value="ddCalcPlayerStats.php">4.Update Player Stats from Game List  (modifies ddeloPlayerStats.json)</option>
        <option value="ddDisplayPlayerStats.php">Show Active Player Stats</option>
        <option value="ddDispInactPlayers.php">Show Inactive Player Stats</option>
        <option value="ddPStatsExp.php">Detailed Games and Stats</option>

      </select>
    </p>
    <div align="center">
      <table border="0" cellpadding="8" cellspacing="8" summary="feedback form">

        <tr><td align="center" colspan="2"><input type="button" value="Confirm" onclick='submitForm();'/><br /></td></tr>
      </table>
      </div>
  </form>

  <script type='text/javascript'>
  function submitForm() {
    var form = document.forms["jump"];
    var selValue = form.menu.options[form.menu.selectedIndex].value;
    form.action = selValue;
    form.submit();
  }
  </script>
