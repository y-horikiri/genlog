/**
 *
 * @param target 対象の文字列
 * @param char padding文字
 * @param length 文字数
 * @returns {string|padLeft}
 */
export function padLeft(target, char, length) {
    if (target.length > length) {
        return target;
    }
    let left = '';
    for (;left.length < length; left += char);
    return (left+target.toString()).slice(-length);
}
