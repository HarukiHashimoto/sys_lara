<template>
    <div class="q_list_menu">
        <h5>ソクラティックな問いリスト</h5>
        <div class="ui vertical menu massive">
            <div class="ui dropdown link fluid selection">
                <span class="text">理由・根拠の問い</span>
                <div class="ui label">3</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div id="Ⅱ-1" class="item q_list">なぜそう言えるのですか？</div>
                    <div id="Ⅱ-2" class="item q_list">それが真実か，どうやって知ることができますか？</div>
                    <div id="Ⅱ-3" class="item q_list">別の理由は考えられますか？</div>
                </div>
            </div>
            <div class="ui  dropdown link fluid selection">
                <span class="text">仮定の問い</span>
                <i class="dropdown icon"></i>
                <div class="ui label">4</div>
                <div class="menu">
                    <div id="Ⅲ-1" class="item q_list">何を仮定していますか？</div>
                    <div id="Ⅲ-2" class="item q_list">仮定を正当化できますか？</div>
                    <div id="Ⅲ-3" class="item q_list">仮定は常に成り立ちますか？</div>
                    <div id="Ⅲ-4" class="item q_list">別の仮定を置くことはできますか？</div>
                </div>
            </div>
            <div class="ui  dropdown fluid selection">
                <span class="text">含意・結果の問い</span>
                <i class="dropdown icon"></i>
                <div class="ui label">3</div>
                <div class="menu">
                    <div id="Ⅳ-1" class="item q_list">どのような狙いがありますか？</div>
                    <div id="Ⅳ-2" class="item q_list">それによってどのような結果を期待していますか？</div>
                    <div id="Ⅳ-3" class="item q_list">他のやり方，提案はありますか？</div>
                </div>
            </div>
            <div class="ui  dropdown fluid selection">
                <span class="text">観点・見方の問い</span>
                <i class="dropdown icon"></i>
                <div class="ui label">3</div>
                <div class="menu">
                    <div id="Ⅴ-1" class="item q_list">長期/短期的スパンで考えることはできますか？</div>
                    <div id="Ⅴ-2" class="item q_list">誰か別の立場から考えることはできますか？</div>
                    <div id="Ⅴ-3" class="item q_list">社会システムを良くするという視点から考えることはできますか？</div>
                </div>
            </div>
            <div class="ui  dropdown fluid selection">
                <span class="text">問いを吟味する問い</span>
                <i class="dropdown icon"></i>
                <div class="ui label">6</div>
                <div class="menu">
                    <div id="Ⅵ-1" class="item q_list">この問いは明確ですか？</div>
                    <div id="Ⅵ-2" class="item q_list">この問いはなぜ重要ですか？</div>
                    <div id="Ⅵ-3" class="item q_list">この問いに答えるのは簡単ですか？</div>
                    <div id="Ⅵ-4" class="item q_list">この問いにどのようにして答えることができますか？</div>
                    <div id="Ⅵ-5" class="item q_list">問いの細分化ができますか？</div>
                    <div id="Ⅵ-6" class="item q_list">この問いの前に，答えるべき問いはありますか？</div>
                </div>
            </div>
            <div class="ui  dropdown fluid selection">
                <span class="text">起源・拠りどころの問い</span>
                <i class="dropdown icon"></i>
                <div class="ui label">2</div>
                <div class="menu">
                    <div id="Ⅶ-1" class="item q_list">あなたは何を問題視していますか？</div>
                    <div id="Ⅶ-2" class="item q_list">あなたは何を最も優先しますか？</div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
