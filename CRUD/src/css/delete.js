function confirmDelete() {
    var confirmed = confirm("삭제하시겠습니까?");
    
    if (confirmed) {
        simulateDelete();
        alert("삭제가 완료되었습니다.");
       
    } else {
        // 사용자가 취소한 경우
    }
}

function simulateDelete() {
    // 여기에서 실제 삭제 작업을 수행하는 대신 시뮬레이션합니다.
    // 삭제 작업을 수행하는 코드를 여기에 추가해야 합니다.
    // 실제 삭제 작업이 성공하면 alert 메시지가 표시될 것입니다.
    // 삭제 작업이 실패하면 오류 메시지를 표시할 수 있습니다.
}

