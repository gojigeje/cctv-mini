var angle = 0;
var rotated = false;
$('#rotateSnapshotRight').on('click', function() {
    angle += 90;
    $('#snapshotimg').rotate(angle);

    if (rotated) {
      $( "#snapshotimg" ).each( function( index, element ){
          $(this).closest("div").height(this.height);
          $(this).css('margin-top', '0');
      });
      rotated = false;
    } else {
      $( "#snapshotimg" ).each( function( index, element ){
          $(this).closest("div").height(this.width);
          $(this).css('margin-top', '12%');
      });
      rotated = true;
    }

});
$('#rotateSnapshotLeft').on('click', function() {
    angle -= 90;
    $('#snapshotimg').rotate(angle);

    if (rotated) {
      $( "#snapshotimg" ).each( function( index, element ){
          $(this).closest("div").height(this.height);
          $(this).css('margin-top', '0');
      });
      rotated = false;
    } else {
      $( "#snapshotimg" ).each( function( index, element ){
          $(this).closest("div").height(this.width);
          $(this).css('margin-top', '12%');
      });
      rotated = true;
    }
});