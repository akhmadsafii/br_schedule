<section>
    <div class="section-title"><span></span><strong>Counting Shift (Statistik)</strong></div>
    <div class="card">
        <div class="code">SELECT shift_id, COUNT(*)
FROM schedules
WHERE employee_id = ?
AND month_id = ?
GROUP BY shift_id;</div>
        <div class="taglist">
            <div class="tag">Total Pagi</div>
            <div class="tag">Total Siang</div>
            <div class="tag">Total Malam</div>
            <div class="tag">Total Libur</div>
        </div>
    </div>
</section>
