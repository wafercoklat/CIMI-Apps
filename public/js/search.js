export default class Search {
    constructor(min, max, location, stats, outdepo, indepo, data, search) {
        this.min = min;
        this.max = max;
        this.location = location;
        this.stats = stats;
        this.outdepo = outdepo;
        this.indepo = indepo;
        this.data = data;
        this.search = search;
    }

    isSearch(data, search) {
        return (data[1].includes(search.toUpperCase()) || data[2].includes(search.toUpperCase()) || data[5].includes(search.toUpperCase()) || data[6].includes(search.toUpperCase()) || data[7].includes(search.toUpperCase()) || data[8].includes(search.toUpperCase()) || data[9].includes(search.toUpperCase()) || data[10].includes(search.toUpperCase()))
    }

    isFilter(min, max, location, stats, outdepo, indepo, data, search) {
        console.log('TEST');
        // if () {
        //     if ((min === undefined || (isNaN(min)) || min == '') && ((isNaN(max)) || max === undefined || max != '') && location != 'SMA' && stats == 'SMA' && search != '') {
        //         return (data[0].includes(stats));
        //     }
        // }
        if (((min != undefined || !(isNaN(min)) || min != '') && (isNaN(max) || max === undefined || max == '')) || (location != 'SMA')) {
            if ((min == outdepo || min == indepo) && location != 'SMA' && stats != 'SMA' && search != '') {
                return (data[5].substring(0, 3) == location) && data[0].includes(stats) && isSearch(data, search) && (min == outdepo || min == indepo);
            }
            if ((min == outdepo || min == indepo) && location != 'SMA' && stats != 'SMA' && search == '') {
                return (min == outdepo || min == indepo) && (data[0].includes(stats) && (data[5].substring(0, 3) == location));
            }
            if ((min == outdepo || min == indepo) && location == 'SMA' && stats != 'SMA' && search != '') {
                return ((min == outdepo || min == indepo) && isSearch(data, search) && (data[0].includes(stats)));
            }
            if ((min == outdepo || min == indepo) && location != 'SMA' && stats == 'SMA' && search != '') {
                return ((min == outdepo || min == indepo) && (data[5].substring(0, 3) == location) && isSearch(data, search));
            }
            if ((min == outdepo || min == indepo) && location != 'SMA' && stats == 'SMA' && search == '') {
                return (data[5].substring(0, 3) == location) && (min == outdepo || min == indepo);
            }
            if ((min == outdepo || min == indepo) && location == 'SMA' && stats != 'SMA' && search == '') {
                return (data[0].includes(stats)) && (min == outdepo || min == indepo);
            }
            if ((min == outdepo || min == indepo) && location == 'SMA' && stats == 'SMA' && search != '') {
                return isSearch(data, search) && (min == outdepo || min == indepo);
            }
            return min == outdepo || min == indepo;
        }

        if ((min != undefined && !(isNaN(min)) && min != '') && (!(isNaN(max)) || max !== undefined || max != '')) {
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location != 'SMA' && stats != 'SMA' && search != '') {
                return (data[5].substring(0, 3) == location) && data[0].includes(stats) && isSearch(data, search) && ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location != 'SMA' && stats != 'SMA' && search == '') {
                return ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && (data[0].includes(stats) && (data[5].substring(0, 3) == location));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location == 'SMA' && stats != 'SMA' && search != '') {
                return (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && isSearch(data, search) && (data[0].includes(stats)));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location != 'SMA' && stats == 'SMA' && search != '') {
                return (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && (data[5].substring(0, 3) == location) && isSearch(data, search));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location != 'SMA' && stats == 'SMA' && search == '') {
                return (data[5].substring(0, 3) == location) && ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location == 'SMA' && stats != 'SMA' && search == '') {
                return (data[0].includes(stats)) && ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max));
            }
            if (((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) && location == 'SMA' && stats == 'SMA' && search != '') {
                return isSearch(data, search) && ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max));
            }
            return ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max));
        }

        return data[3] || data[5];
    }

    static test(test) {
        console.log('hello world' + test);
    }
}