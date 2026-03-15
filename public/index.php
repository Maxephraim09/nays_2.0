<?php
// ========================================
// PUBLIC INDEX - REDIRECT TO ROOT
// ========================================

header('Location: ../index.php?url=' . $_SERVER['QUERY_STRING']);
exit;