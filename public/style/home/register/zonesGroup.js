/*
 * 国际手机号码，下拉框
 * create by ouyangyibin on 2015-11-19 14:41:01
 * -  是他们逼我写的，是违背我意愿的。
 */

(function(){

	var NS = function(){};

	NS.prototype.VERSION = '1.0.0';

	/* 初始化 */
	NS.prototype.init = function(_data) {
		this.input_zone = _data.input_zone;		// input 隐藏域
		this.div_zoneVal = _data.div_zoneVal;	// 选择的 区间号 的 div
		this.div_zones = _data.div_zones;		// 下拉框 的 div
		this.ul_title = _data.ul_title;			// 下拉框 的 标题
		this.div_tabcont = _data.div_tabcont;	// 下拉框 的 所有内容的 div
		this.limit_size = _data.limit_size;		// undefined / Number 限制显示在值的字数

		if( !(this.input_zone && this.div_zoneVal && this.div_zones && this.ul_title && this.div_tabcont) ){
			if( !!console ){
				console.log('下拉框初始化错误..');
				console.log('input_zone: ' + this.input_zone);
				console.log('div_zoneVal: ' + this.div_zoneVal);
				console.log('div_zones: ' + this.div_zones);
				console.log('ul_title: ' + this.ul_title);
				console.log('limit_size: ' + this.limit_size);
			}
			return ;
		}

		this.slideFlag = false;					// 标志位：判断是否下拉

		var self = this;

		/* tabcont 的 li 中 CSS 控制 */
		$.each(this.div_tabcont.children('.ul_tabcont'), function(i, n){
			for( var j = 3 ; j < $(n).children('li').length ; j += 4 ){
				$(n).children('li').eq(j).css('margin-right', '0');
			}
			$.each($(n).children('li'), function(p, q){
				var size = 9;
				var country = $(q).attr('data-country');
				var zone = $(q).attr('data-zone');
				if( Math.ceil(country.length + (zone.length + 1) / 2) >= size ){
					var str = self.catCountry(country, zone, size);
					if( /\./.test(str) ){
						$(q).attr('title', country + ' ' + zone);
					}
					$(q).text(str);
				}
			})
		});

		/* 点击 下拉出 所有国家区号框 事件 */
		this.div_zoneVal.on('click', function(){
			self.slideFlag = !self.slideFlag;
			if( self.slideFlag ){
				self.div_zones.show();
				self.div_tabcont.children('ul').hide();
				if( self.div_tabcont.children('ul.ul_clicked').length == 0 ){
					self.div_tabcont.children('ul').eq(0).show();
				}else{
					self.div_tabcont.children('ul.ul_clicked').show();
				}
			}else{
				self.div_zones.hide();
				self.ul_title.children('li').eq(
					self.div_tabcont.children('ul.ul_clicked').index()
				).trigger('click');
			}
		});

		/* 标题 点击 切换 tabcont 事件 */
		this.ul_title.delegate('li', 'click', function(){
			$(this).siblings().removeClass('li_active');
			$(this).addClass('li_active');
			self.div_tabcont.children('ul').hide();
			self.div_tabcont.children('ul').eq($(this).index()).show();
		});

		/* 点击 区号 li 事件 */
		this.div_tabcont.delegate('ul li', 'click', function(){
			var country = $(this).attr('data-country');
			var zone = $(this).attr('data-zone');
			var id = $(this).attr('data-id');
			if( country.length > 5 ){
				var str = country.substring(0, 4) + ' ' + zone;
			}else{
				var str = country + ' ' + zone;
			}

			if( self.div_tabcont.children('ul.ul_clicked').length == 0 ){
				$(this).addClass('li_clicked');
				$(this).parent().addClass('ul_clicked');
			}else{
				if( $(this).parent().hasClass('ul_clicked') ){
					$(this).siblings().removeClass('li_clicked');
					$(this).addClass('li_clicked');
				}else{
					self.div_tabcont.children('ul.ul_clicked').children('li').removeClass('li_clicked');
					self.div_tabcont.children('ul.ul_clicked').removeClass('ul_clicked');
					$(this).addClass('li_clicked');
					$(this).parent().addClass('ul_clicked');
				}
			}
			self.input_zone.val(zone);
			self.div_zoneVal.attr('data-country', country);
			self.div_zoneVal.attr('data-zone', zone);
			self.div_zoneVal.attr('data-id', id);			
			if( self.limit_size ){
				self.div_zoneVal.text(self.catCountry(country, zone, self.limit_size));
			}else{
				self.div_zoneVal.text(self.catCountry(country, zone, 99));
			}
			self.div_zones.hide();

			self.slideFlag = false;
		});

		return this;
	};

	/*
	 * 合并成理想的长度 并 返回
	 * -  这段代码的确很挫，函数名称是合并成合理的长度，
	 *    然后它一点都不合理，我知道你也知道，
	 *    先不要骂我2B了，请先继续往下看
	 */
	NS.prototype.catCountry = function(_country, _zone, _size) {
		if( Math.ceil(_country.length + (_zone.length + 1) / 2) < _size )
			return _country + ' ' + _zone;
		var num = _size - Math.ceil((_zone.length + 3) / 2);
		if( num < 1 )
			return '';	// 如果装不下，此处返回空！是坑！
		var str = _country.substring(0, num) + '.. ' + _zone;
		return str;
	};

	window.zonesGroup = NS;

})();