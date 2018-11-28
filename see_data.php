<script src="./autoban.js"></script>
<script type="text/javascript">
    var conn = new ab.Session('ws://localhost:8080',
        function() {
            conn.subscribe('kittensCategory', function(topic, data) {
                console.log(data);
            });
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );
</script>